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
use App\Mail\SendOrderEmail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email, $full_name, $cart, $subject;

    public $tries = 3;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->email = $data['email'];
        $this->full_name = $data['full_name'];
        $this->cart = $data['cart'];
        $this->subject = $data['subject'];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Mail::to($this->email)->send(new SendOrderEmail($this->full_name, $this->cart, $this->subject));
            Log::info('Mail sent!');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
        }
    }
}
