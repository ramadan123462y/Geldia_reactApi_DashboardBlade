<?php

namespace App\Core\Dashboard\Service;

use Illuminate\Support\Facades\Auth;

class AuthService
{

    public function check($guard, $userDto)
    {


        if (Auth::guard('admin')->attempt(['email' => $userDto->getEmail(), 'password' => $userDto->getPassword()])) {


            return true;
        }
        return false;
    }

    public function logout($guard)
    {


        Auth::guard($guard)->logout();
    }
}
