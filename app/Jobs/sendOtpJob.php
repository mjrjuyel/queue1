<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Mail\SendOtpMail;

class sendOtpJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    // public $otp;

    public function __construct()
    {
    
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \Mail::to('mjrcoder7@gmail.com')->send(new SendOtpMail());
    }
}
