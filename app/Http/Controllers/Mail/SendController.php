<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mail\Request as MailRequest;
use App\Mail\SendMailUser;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SendController extends Controller
{
    public $MailRequest;

    public function send(MailRequest $mailRequest)
    {
        $mailRequest = $mailRequest->validated();

        $userData = User::where('email', $mailRequest['email'])->get();

        if(User::where('email', $mailRequest)->exists()){

            $timeDate      = md5(date('dd/mm/yyyy H:i'));
            $generateToken = [
                'token' => $timeDate,
            ];
            User::where('email', $mailRequest['email'])->update($generateToken);

            Mail::to($mailRequest['email'])->send(new SendMailUser($mailRequest, $userData));
            return response()->json(["message" => "Success"], 200);
        }else{
            return response()->json(["message" => "Email não encontrado"], 404);
        }

    }
}
