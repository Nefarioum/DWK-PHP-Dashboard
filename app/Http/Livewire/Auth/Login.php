<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{

    public $userid = '';
    public $password = '';
    public $rememberMe = false;

    protected $rules = [
        'userid' => 'required|exists:users,userid',
        'password' => 'required',
    ];

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.guest', ['title' => 'DWK Login Page']);
    }

    public function login() {
        $credentials = $this->validate();
        return auth()->attempt($credentials)
            ? redirect()->intended('/dashboard')
            : $this->addError('name', trans('auth.failed'));
    }

}
