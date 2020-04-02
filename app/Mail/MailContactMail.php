<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailContactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels ;

    protected $firsNname;
    protected $lastName;
    protected $subjectMessage;
    protected $messageContact;
    protected $emailTo;
    protected $emailFrom;

    /**
     * Create a new message instance.
     * @param $subject
     * @param $message
     * @param $to
     * @param $from
     */
    public function __construct($firstname,$lastname,$subject,$message,$to,$from)
    {
        $this->firstNname = $firstname;
        $this->lastName = $lastname;
        $this->subjectMessage = $subject;
        $this->messageContact = $message;
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
            ->subject($this->subjectMessage)
            ->html($this->messageContact);
    }
}
