<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecordatorioPago extends Mailable
{
    use Queueable, SerializesModels;

    public $servicio;
    public $fecha_pago;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($servicio,$fecha_pago)
    {
        $this->servicio=$servicio;
        $this->fecha_pago=$fecha_pago;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mails.pago')->subject('¡Realiza tu pago a tiempo!');
    }
}
