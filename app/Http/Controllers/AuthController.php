<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\Auth\RequestCreate;

class AuthController extends Controller
{
    public function register(RequestCreate $requestCreate)
    {
        return User::create($requestCreate->validated());
    }

    public function login(RequestCreate $requestCreate)
    {
        if(!Auth::attempt($requestCreate->except('name'))){
            return response([
                'message' => 'Invalid Credentials!'
            ], 401);
        }

        $token  = Auth::user()->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, 68 * 24); // 1 Day

        return response([
            'message' => 'Success'
        ])->withCookie($cookie);
    }

    public function user()
    {
        return Auth::user();
    }

    public function logout()
    {
        $cookie = Cookie::forget('jwt');

        return response([
            'message' => 'Success'
        ])->withCookie($cookie);
    }

    public function forgotPassword()
    {
        
    }
}