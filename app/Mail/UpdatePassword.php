<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdatePassword extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    private $password;
    private $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password, $name)
    {
        $this->user = $user;
        $this->password = $password;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject(__('Solicitud de reestablecimiento de contraseña '.config('app.name')))
            ->markdown('emails.update_password_movil')
            ->with('user',$this->user)
            ->with('password',$this->password)
            ->with('name',$this->name);
    }
}
