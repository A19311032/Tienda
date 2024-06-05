<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }
    
    public function build()
    {
        return $this->subject('Bienvenido a Nuestro Servicio') // Establece el asunto del correo
                    ->view('emails.usuario_correo')
                    ->with([
                        'username' => $this->user->name, // Ajusta esto si necesitas un campo diferente
                        'password' => $this->password,
                    ]);
    }
}
