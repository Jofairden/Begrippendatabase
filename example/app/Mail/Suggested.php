<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Suggested extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $info;
    public $categories;
    public $mail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $info, $categories, $mail)
    {
        $this->name = $name;
        $this->info = $info;
        $this->categories = $categories;
        $this->mail = $mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pbb@digischool.nl', 'Steef Steneken')
                    ->view('emails.suggestie');
    }
}
