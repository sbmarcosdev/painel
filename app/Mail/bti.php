<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class bti extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $user = $this->user;

        $this->subject('Teste de E-mail Laravel');
        $this->to($user->email );

        return $this->markdown('mail.teste', compact ('user'));
    }
}
