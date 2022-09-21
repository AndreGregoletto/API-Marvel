<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mail\Request as MailRequest;
use App\Mail\SendMailUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendController extends Controller
{
    public $MailRequest;

    public function send(MailRequest $MailRequest)
    {
        $MailRequest = $MailRequest->validated();
        $userData = User::where('email', $MailRequest['email'])->get();
        // dd($MailRequest['email']);
        Mail::to($MailRequest['email'])->send(new SendMailUser($MailRequest, $userData));
    }
}
