<?php

namespace App\Livewire\Auth;


use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Factories\AuthenticationFactory;

class Login extends Component
{
    /** @var string */
    public $user_name = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected AuthenticationFactory $authFactory;

    protected $rules = [
        'user_name' => ['required', 'min:9', 'max:9'],
        'password' => ['required'],
    ];

    public function __construct()
    {

        $this->authFactory = app(AuthenticationFactory::class);
    }

    public function authenticate(): mixed
    {
        $this->validate();


        if (! $this->authFactory->attemptLogin($this->user_name, $this->password, $this->remember)) {
            return  $this->addError('user_name', trans('auth.failed'));
        }

        return redirect()->intended(route('home'));
    }

    public function render(): View
    {
        return view('livewire.auth.login')->extends('components.layouts.auth');
    }
}
