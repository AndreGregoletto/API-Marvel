<?php

namespace App\Mail;

use App\Http\Requests\Mail\Request;
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
        $this->dataRequest = $userData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->dataRequest[0]->email)
            ->markdown('emails.orders.shipped', ['dataRequest' => $this->dataRequest]);
    }
}
