<?php

namespace App\Livewire\Frontend\Profile;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $full_name, $email, $phone, $gender, $address, $bio, $userDetail;

    protected $rules = [
        'full_name' => ['string', 'max:255', 'required'],
        'email' => ['email', 'max:255', 'required'],
        'phone' => ['string', 'max:11', 'min:10'],
        'gender' => ['string', 'required'],
        'address' => ['string', 'max:255'],
        'bio' => ['string', 'max:255'],
    ];

    public function mount(){
        $this->userDetail = UserDetails::where('user_id', Auth::id())->first();

        if($this->userDetail){
            $this->full_name = $this->userDetail->full_name;
            $this->email = $this->userDetail->email;
            $this->phone = $this->userDetail->phone;
            $this->gender = $this->userDetail->gender;
            $this->address = $this->userDetail->address;
            $this->bio = $this->userDetail->bio;
        }else{
            $this->full_name = Auth::user()->name;
            $this->email = Auth::user()->email;
        }
    }

    public function trackOrder($trackNo){
        return $this->redirectRoute('track_order', ['tracking_no' => $trackNo]);
    }

    public function saveDetails(){
        $userDetail = $this->validate();
        $user = User::where('id', Auth::id())->first();

        if(UserDetails::where('user_id', Auth::id())->exists()){
            $this->userDetail->update($userDetail);

            if($user->email === $userDetail['email']){
                $user->update([
                    'name' => $userDetail['full_name'],
                ]);
            }else{
                $user->update([
                    'name' => $userDetail['full_name'],
                    'email' => $userDetail['email'],
                ]);
            }
        }else{
            $userDetail['user_id'] = Auth::id();
            UserDetails::create($userDetail);

            if($user->email === $userDetail['email']){
                $user->update([
                    'name' => $userDetail['full_name'],
                ]);
            }else{
                $user->update([
                    'name' => $userDetail['full_name'],
                    'email' => $userDetail['email'],
                ]);
            }
        }
        session()->flash('toast-message', 'Profile Details Updated!.');


    }

    public function render()
    {
        return view('livewire.frontend.profile.index', [
            'userDetail' => $this->userDetail,
        ]);
    }
}
