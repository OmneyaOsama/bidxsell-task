<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Event;

class EventReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $customer;

    public function __construct($customer, Event $event)
    {
        $this->customer = $customer;
        $this->event = $event;
    }

    public function build()
    {
        return $this->subject('Reminder: Upcoming Event')
                    ->view('emails.event_reminder')
                    ->with([
                        'event_name' => $this->event->event_name,
                        'event_date_time' => $this->event->event_date_time,
                        'venue' => $this->event->venue,
                        'customer_name' => $this->customer->customer_name,
                    ]);
    }
}
