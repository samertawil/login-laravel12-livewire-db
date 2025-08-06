<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AidCitizenRegistration;
use Symfony\Component\HttpFoundation\Response;

class CheckToRegister
{

    public function handle(Request $request, Closure $next): Response
    {

        $data = AidCitizenRegistration::where('idc', Auth::user()->user_name)->first();

        if (! $data) {
            return $next($request);
        }

        return redirect()->route('aid.edit');
    }
}
