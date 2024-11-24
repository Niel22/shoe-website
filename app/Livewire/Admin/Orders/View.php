<?php

namespace App\Livewire\Admin\Orders;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Livewire\Component;

class View extends Component
{
    public $id, $status;

    public function updateStatus($id){

        Order::where('id', $id)->first()->update([
            'status_message' => $this->status
        ]);

        session()->flash('message','Order status updated');
    }

    public function generateInvoice($id){
        $order = Order::findOrFail($id);


        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data)->output();

        $todayDate = Carbon::now()->format('d-m-Y');
        $fileName = 'invoice'. $order->full_name . '-' . $todayDate .'.pdf';


        return response()->streamDownload(
            fn () => print($pdf),
            $fileName
       );

    }


    public function render()
    {
        $order = Order::where('id', $this->id)->first();
        if($order){

            return view('livewire.admin.orders.view', compact('order'));
        }else{
            return abort(404);
        }
    }
}
