<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailUser extends Mailable
{
    use Queueable, SerializesModels;

    protected $dataRequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($MailRequest, $userData)
    {
        $updateData = User::where('id', $userData[0]['id'])->get();
        $this->dataRequest = $updateData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('laraveltestsendemail@gmail.com')
                    ->markdown('emails.orders.shipped', ['dataRequest' => $this->dataRequest]);
    }
}
