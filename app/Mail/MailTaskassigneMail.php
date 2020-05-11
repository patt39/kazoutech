<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailTaskassigneMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels ;

    
    protected $subjectassigneTask;
    protected $messageassigneTask;
    protected $emailTo;
    protected $emailFrom;

    /**
     * Create a new message instance.
     * @param $subject
     * @param $message
     * @param $to
     * @param $from
     */
    public function __construct($subject,$message,$to,$from)
    {
        
        $this->subjectassigneTask = $subject;
        $this->messageassigneTask = $message;
        $this->emailTo = $to;
        $this->emailFrom = $from;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->to($this->emailTo)->from($this->emailFrom)
            ->subject($this->subjectassigneTask)
            ->html($this->messageassigneTask);
    }
}
