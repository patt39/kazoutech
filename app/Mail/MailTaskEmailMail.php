<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailTaskEmailMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $subjectTask;
    protected $messageTask;
    protected $emaiTo;
    protected $emailFrom;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$message,$to,$form)
    {
        $this->subjectTask = $subject;
        $this->messageTask= $message;
        $this->emaiTo = $to;
        $this->emailFrom = $form;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->emaiTo)->from($this->emailFrom)
            ->subject($this->subjectTask)
            ->html($this->messageTask);
    }
}
