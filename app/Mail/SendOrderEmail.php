<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $fullname, $cart, $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullname, $cart, $subject)
    {
        $this->fullname = $fullname;
        $this->cart = $cart;
        $this->subject = $subject;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fullname = $this->fullname;
        $cart = $this->cart;
        return $this->from($address = "noreply@laravelclass.com", config('app.name'))
            ->subject($this->subject)
            ->markdown('email.OrderEmailTemplate', compact('fullname', 'cart'));
    }
}
