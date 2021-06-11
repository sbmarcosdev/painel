<?php

namespace App\Mail;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class bti extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function build()
    {
        $request = $this->request;

        $this->subject($request->assunto);
        $this->from( $request->email, $request->name );

        if($request->emailcc)
            $this->cc($request->emailcc );

        return $this->markdown('mail.body', compact ('request'));
    }
}
