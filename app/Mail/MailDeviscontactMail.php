<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailDeviscontactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels ;

    protected $fullName;
    protected $messageContact;
    protected $emailTo;
    protected $emailFrom;

    /**
     * Create a new message instance.
     * @param $message
     * @param $to
     * @param $from
     */
    public function __construct($fullname,$message,$to,$from)
    {
        $this->fullName = $fullname;
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
            ->subject("Devis")
            ->html($this->messageContact);
    }
}
