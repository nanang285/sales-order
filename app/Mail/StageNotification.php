<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Recruitment;

class StageNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $recruitment;
    public $stageDescription;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Recruitment $recruitment, $stageDescription, $status)
    {
        $this->recruitment = $recruitment;
        $this->stageDescription = $stageDescription;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->status === 'success' ? 'Notifikasi Baru' : 'Notifikasi Baru';

        return $this->subject($subject)->view('emails.stage_notification');
    }
}
