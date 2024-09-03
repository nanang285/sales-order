<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecruitmentReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $recruitment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recruitment)
    {
        $this->recruitment = $recruitment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    //  Dikirim Ke Email Pelamar
    public function build()
    {
        return $this->view('emails.recruitment_receive')
                    ->with([
                        'name' => $this->recruitment->name,
                    ])
                    ->subject('Notifikasi Baru');
    }
    
}
