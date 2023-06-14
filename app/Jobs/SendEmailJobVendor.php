<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\SendVendorEmail;

class SendEmailJobVendor implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email, $content, $subject;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $content, $subject)
    {
        $this->email = $email;
        $this->content = $content;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Mail::to($this->email)->send(new SendVendorEmail($this->content, $this->subject));
            Log::info('Mail sent!');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
        }
    }
}
