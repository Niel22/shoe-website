<?php

namespace App\Livewire\Frontend\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VerifyEmail extends Component
{
    public $email;

    public function mount(){
        $this->email = Auth::user()->email;
    }

    public function verification_notification(){
        $user = User::where('email', $this->email)->first();

        if ($user) {
            $user->sendEmailVerificationNotification();
            session()->flash('toast-message', 'Verification link sent!');
        } else {
            session()->flash('toast-error', 'User not found!');
        }

        session()->flash('toast-message', 'Verification link sent!');
    }

    public function render()
    {
        return view('livewire.frontend.auth.verify-email');
    }
}
