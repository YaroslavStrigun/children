<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class HelpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $subject;

    /**
     * HelpMail constructor.
     * @param array $data
     * @param string $subject
     */
    public function __construct(array $data, string $subject)
    {
        $this->data = $data;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('emails.help')->with($this->data);
    }
}
