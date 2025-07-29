<?php

namespace App\Factories;

use Illuminate\Support\Facades\Auth;

class AuthenticationFactory
{
    public function attemptLogin(string $user_name, string $password, bool $remember): bool
    {
        // Attempt authentication with given credentials
        return Auth::attempt(['user_name' => $user_name, 'password' => $password], $remember);
    }
}
