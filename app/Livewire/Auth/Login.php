<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate]
    public $email;

    #[Validate]
    public $password;

    public $remember_token = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
        'remember_token' => 'boolean',
    ];

    protected $messages = [
        'email.required' => 'Alamat email wajib diisi.',
        'email.email' => 'Format alamat email tidak valid.',
        'password.required' => 'Kata sandi wajib diisi.',
        'password.min' => 'Kata sandi harus terdiri dari minimal :min karakter.',
        'remember_token.boolean' => 'Nilai remember harus berupa boolean.',
    ];

    public function render()
    {
        return view('livewire.auth.login')
            ->extends('layouts.auth');
    }

    public function login()
    {
        $this->validate();
        
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials, $this->remember_token)) {
            if (Auth::user()->role === 'admin') {
                return to_route('admin.dashboard');
            }

            return to_route('employee.dashboard');
        }

        return back()->withInput();
    }
}
