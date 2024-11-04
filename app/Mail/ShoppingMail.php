<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Bill;

class ShoppingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $bill;
    public $detail = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Bill $bill, $detail)
    {
        $this->bill = $bill;
        $this->detail = $detail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.shopping-mail');
    }
}
