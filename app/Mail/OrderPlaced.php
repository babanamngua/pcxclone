<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $orderItems;
    public $shippingCost;

    public function __construct($order, $orderItems,$shippingCost)
    {
        $this->order = $order;
        $this->orderItems = $orderItems;
        $this->shippingCost = $shippingCost;
    }

    public function build()
    {
        return $this->view('emails.orderplaced')
                    ->with([
                        'order' => $this->order,
                        'orderItems' => $this->orderItems,
                        'shippingCost' => $this->shippingCost,
                    ]);
    }
}
