<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VideogameDeleted extends Mailable
{
    use Queueable, SerializesModels;

    public $videogame;
    public $user;

    public function __construct($videogame, $user)
    {
        $this->videogame = $videogame;
        $this->user = $user;
    }

    public function build()
    {
        return $this->from("noreply@videogames.db")
                    ->view("mail.videogameDelete");
    }
}
