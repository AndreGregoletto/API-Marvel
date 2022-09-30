<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\Auth\RequestCreate;
use App\Http\Requests\ForgotPassword\RequestUpdate;

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

    public function recover(RequestUpdate $requestUpdate)
    {
        $userData    = $requestUpdate->validated();
        $newPassword = [
            'password' => Hash::make($userData['password'])
        ];

        $userRecover = User::where('email', $userData['email'])
                           ->where('token', $userData['token'])
                           ->get();

        User::where('id', $userRecover[0]['id'])->update($newPassword);
        
        return response([
            'message' => 'Success'
        ], 200);
    }
}