<?php

namespace App\Jobs;

use App\Mail\MailDeviscontactMail;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailDeviscontactMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $fullName;
    protected $message;
    protected $emailTo;
    protected $from;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($fullname,$message,$to,$from)
    {

        $this->fullName = $fullname;
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

                $emailData = new MailDeviscontactMail(
                    $this->fullName,
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
