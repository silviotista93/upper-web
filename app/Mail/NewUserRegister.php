<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserRegister extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    private $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return (new MailMessage)
            ->subject('Solicitud de reestablecimiento de contraseña')
            ->greeting('Hola '.$this->user->name)
            ->line('Recibes este email porque se solicitó un restablecimiento de contraseña para tu cuenta.')
            ->action('Reestablecer Contraseña', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('Si no realizaste esta petición, puedes ignorar este correo y nada habrá cambiado.')
            ->salutation('¡Saludos!');
    }
}
