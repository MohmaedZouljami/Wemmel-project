<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $naam;
    public $email;
    public $onderwerp;
    public $bericht;

    public function __construct($naam, $email, $onderwerp, $bericht)
    {
        $this->naam = $naam;
        $this->email = $email;
        $this->onderwerp = $onderwerp;
        $this->bericht = $bericht;
    }

    public function build()
    {
        return $this->subject('Nieuw contactbericht: ' . $this->onderwerp)
            ->view('emails.contact');
    }
}
