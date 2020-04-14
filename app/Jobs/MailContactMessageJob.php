<?php

namespace App\Jobs;

use App\Mail\MailContactMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailContactMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $firstname;
    protected $lastname;
    protected $subject;
    protected $message;
    protected $emailTo;
    protected $from;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($firstname,$lastname,$subject,$message,$to,$from)
    {

        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->subject = $subject;
        $this->message = $message;
        $this->emailTo = $to !== null? Arr::wrap($to) : [];
        $this->from = $from !== null? Arr::wrap($from) : [];

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            foreach ($this->emailTo as $email){

                $emailData = new MailContactMail(
                    $this->firstname,
                    $this->lastname,
                    $this->subject,
                    $this->message,
                    $email,
                    $this->from
                );
                Mail::send($emailData);
            }
        }catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }

    /**
     * The job failed to process.
     *
     * @param Exception $e
     * @return void
     */
    public function failed(Exception $e)
    {
        Log::error($e->getMessage());
    }
}
