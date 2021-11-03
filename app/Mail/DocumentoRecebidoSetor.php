<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Setor;

class DocumentoRecebidoSetor extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Setor $setor)
    {
        $this->setor = $setor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = env('EMAIL_SISTEMA');
        return $this->from($email)
            ->subject('Processus')
            ->with([
                'user' => $this->setor,
            ])
            ->view('emails.documentoRecebidoSetor');
    }
}
