<?php

namespace App\Jobs;

use App\Mail\MailTaskEmailMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailTaskEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $subject;
    protected $message;
    protected $emailTo;
    protected $emaiFrom;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subjectTask,$messageTask,$to=[],$from=[])
    {
        $this->subject = $subjectTask;
        $this->message = $messageTask;
        $this->emailTo = $to !== null? Arr::wrap($to) : [];
        $this->emaiFrom = $from !== null? Arr::wrap($from) : [];

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            foreach ($this->emailTo as $email){
                $emailData = new MailTaskEmailMail($this->subject,$this->message,$email,$this->emaiFrom);
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
