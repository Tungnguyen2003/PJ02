<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    public $shipping_method;
    public $payment_method;
    public $customer;
    public $token;
    public function __construct($order, $shipping_method, $payment_method, $customer, $token)
    {
        $this->order = $order;
        $this->shipping_method = $shipping_method;
        $this->payment_method = $payment_method;
        $this->customer = $customer;
        $this->token = $token;
    }

//    /**
//     * Get the message envelope.
//     *
//     * @return \Illuminate\Mail\Mailables\Envelope
//     */
//    public function envelope()
//    {
//        return new Envelope(
//            subject: 'Order Mailable',
//        );
//    }
//
//    /**
//     * Get the message content definition.
//     *
//     * @return \Illuminate\Mail\Mailables\Content
//     */
//    public function content()
//    {
//        return new Content(
//            view: 'view.name',
//        );
//    }
//
//    /**
//     * Get the attachments for the message.
//     *
//     * @return array
//     */
//    public function attachments()
//    {
//        return [];
//    }

    public function build(){
        return $this->view("mails.order");
    }
}
