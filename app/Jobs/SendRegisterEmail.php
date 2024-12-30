<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Mail\SendEmailRegister;
use App\Mail\SendEmailAdmin;
use App\Mail\SendOtpMail;

class SendRegisterEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $insert;
    
    public function __construct($insert)
    {
        $this->insert = $insert;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \Mail::to('mjrcoder7@gmail.com')->send(new SendEmailRegister($this->insert));
        \Mail::to('mjrcoder7@gmail.com')->send(new SendEmailAdmin($this->insert));
    }
}
