<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VendaFinalizada extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($vendedor, $modelo)
    {
        $this->vendedor = $vendedor;
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
    $subject = '[Venda Finalizada] A venda da Aeronave foi concluída!';

    return $this->view('email.vendafinalizada')
                ->with('aeronave', $this->modelo)
                ->with('vendedor', $this->vendedor)
                ->from($address, $name)                                
                ->replyTo($address, $name)
                ->subject($subject);
        }
    
}
