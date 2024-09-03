<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecruitmentStored extends Mailable
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

    //  Dikirim ke Email Admin
    public function build()
    {
        return $this->view('emails.recruitment_stored')
                    ->with([
                        'name' => $this->recruitment->name,
                        'email' => $this->recruitment->email,
                        'phone_number' => $this->recruitment->phone_number,
                        'nik' => $this->recruitment->nik,
                        'address' => $this->recruitment->address,
                        'study' => $this->recruitment->study,
                        'position' => $this->recruitment->position,
                        'onsite' => $this->recruitment->onsite,
                        'agree' => $this->recruitment->agree,
                        'salary' => $this->recruitment->salary,
                        'portfolio' => $this->recruitment->portfolio,
                        'test' => $this->recruitment->test,
                        'file_path' => $this->recruitment->file_path,
                    ])
                    ->subject('Notifikasi Baru');
    }
}
