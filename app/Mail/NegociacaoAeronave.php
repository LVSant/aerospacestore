<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NegociacaoAeronave extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
    $address = 'aerocaststore@gmail.com';
    $name = 'Aerocast Store';
    $subject = '[Negociação] Um comprador tem interesse em uma de suas aeronaves!';

    return $this->view('email.negociacao')
                ->with('aeronave', $this->modelo)
                ->from($address, $name)                                
                ->replyTo($address, $name)
                ->subject($subject);
        }
    
}
