<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Services\Service;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService extends Service
{
    public function checkCredentials($user, LoginRequest $request)
    {
        if(!$user || !Hash::check($user->password, $request->password)) {
            throw ValidationException::withMessages([
                "email"=> ['The provided credentials are incorrect.'],
            ]);
        }
    }
}