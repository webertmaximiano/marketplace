<?php

namespace App\Mail;
use App\Http\Controllers\Cplug\ProspectController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProspectRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->subject('Novo Prospecto Cplug')->markdown('emails.prospect.mail');
        return $this->subject('Novo Prospecto Cplug'. $this->data->subject)
        ->view('emails.prospect');
    }
}

    