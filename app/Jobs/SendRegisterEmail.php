<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Mail\SendEmailRegister;
use App\Mail\SendEmailAdmin;

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
        \Mail::to($this->insert->email)->send(new SendEmailRegister($this->insert));
        
        \Mail::to('admin@gmail.com')->send(new SendEmailAdmin($this->insert));
    }
}
