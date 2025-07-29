<?php

namespace App\Livewire\Auth;


use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Login extends Component
{
    /** @var string */
    public $user_name = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'user_name' => ['required','min:9','max:9'],
        'password' => ['required'],
    ];

    public function authenticate(): mixed
    {
        $this->validate();

        if (!Auth::attempt(['user_name' => $this->user_name, 'password' => $this->password], $this->remember)) {
            return  $this->addError('user_name', trans('auth.failed'));
        }

        return redirect()->intended(route('home'));
    }

    public function render(): View
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
