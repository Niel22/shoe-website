<?php

namespace App\Livewire\Frontend\Checkout;

use App\Mail\OrderPlaced;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Livewire\Component;

class Payment extends Component
{
    public $email, $orderID, $amount, $quantity, $order_id, $currency, $reference, $order_data = [];

    protected $rules = [
        'email' => ['required'],
        'orderID' => ['required'],
        'amount' => ['required'],
        'quantity' => ['required'],
        'currency' => ['required'],
        'reference' => ['required']
    ];

    public function mount(){
        if (session('order_data')) {
        $this->order_data = session('order_data');
        $this->email = $this->order_data['email'];
        $this->order_id = $this->order_data['order_id'];
        $this->amount = $this->order_data['total_price'];
        $this->quantity = $this->order_data['quantity'];
        $this->currency = 'NGN';
        $this->reference = "BPS". Str::random(10);
        }
    }

    public function redirectToGateway()
    {

        $data = array(
            "amount" => $this->amount * 100,
            "email" => $this->email,
            "quantity" => $this->quantity,
            "currency" => $this->currency,
            "reference" => $this->reference,
        );


        // dd($data);
        try{
            $authorizationUrl = paystack()->getAuthorizationUrl($data);

            Order::where('id', $this->order_id)->update([
                'reference' => $this->reference
            ]);
            return redirect($authorizationUrl->url);

        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        // dd(paystack()->getAllTransactions());
        try {

            $paystack = 'pk_test_778f7703f4128fafa6cd6e3aa2fac8434b69004f';

            // dd($this->reference);
            // Make a GET request to Paystack's verify endpoint
            $order = Order::where('id', $this->order_id)->first();
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $paystack, // Add your Paystack secret key here
            ])->get('https://api.paystack.co/transaction/verify/' . $order->reference);

            // Decode the response
            $paymentDetails = $response->json();

            if ($paymentDetails['data']['gateway_response'] === "Successful") {
                // dd($this->order_id);

                $order->update([
                    'payment_status' => 'Paid',
                ]);

                $data = [
                    'url' => "http://127.0.0.1:8000/track-order/". $order->tracking_no,
                    'total_price' => $order->total_price
                ];
                Mail::to(Auth::user()->email)->send(new OrderPlaced($data));
                return $this->redirect('thank-you');
                session()->flash('toast-success', 'Payment Confirmed');
                session()->forget('order_data');

            } else {
                // Handle verification failure
                session()->flash('toast-error', 'Payment not confirmed, if you are sure you made the payment, click confirm payment again.');
            }
        } catch (\Exception $e) {
            session()->flash('toast-error', 'Payment not confirmed, if you are sure you made the payment, click confirm payment again.');
        }

    }

    public function render()
    {
        // dd(session('order_data'));
        if (session('order_data')) {
            $order = session('order_data');
            $order = $order['total_price'];
            return view('livewire.frontend.checkout.payment', compact('order'));
        } else {
            return abort(404);
        }
    }
}
// BPST9b0d5ucBT
// BPSn5mG6H8rWO
