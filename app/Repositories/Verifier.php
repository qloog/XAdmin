<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class Verifier
{

    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials))
        {
            return Auth::user()->id;
        }

        return false;
    }
}