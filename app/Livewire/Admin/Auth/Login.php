<?php

namespace App\Livewire\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = "", $password = "";

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8'],
    ];

    public function updated($propertyName){

        $this->store();
    }

    public function store()
    {

        $user = $this->validate();



        if (Auth::attempt($user)) {
            session()->regenerate();

            if (!Auth::user()->is_admin) {
                Auth::logout();

                session()->invalidate();

                session()->regenerateToken();

                $this->addError('email', 'Invalid Email Address or Password');
            }

            session()->flash('message', 'Welcome to Dashboard');

            return $this->redirect(route('dashboard'));
        }

        $this->addError('email', 'Invalid Email Address or Password');
    }

    public function render()
    {
        return view('livewire.admin.auth.login');
    }
}
