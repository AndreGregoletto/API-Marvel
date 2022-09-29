<?php

use Illuminate\Support\Facades\Route;

Route::get('teste', function(){
    return view('emails.password.forgot-password');
});