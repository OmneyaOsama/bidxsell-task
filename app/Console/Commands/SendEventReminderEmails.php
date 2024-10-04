<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventReminderMail;
use Carbon\Carbon;

class SendEventReminderEmails extends Command
{
    protected $signature = 'send:reminder-emails';
    protected $description = 'Send email reminders to customers 6 hours before the event starts';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $reminderTime = Carbon::now()->addHours(6);

        $events = Event::where('event_date_time', '>=', Carbon::now())
            ->where('event_date_time', '<=', $reminderTime)
            ->get();

        foreach ($events as $event) {
            $tickets = Ticket::where('event_id', $event->id)->get();

            foreach ($tickets as $ticket) {
                Mail::to($ticket->customer_email)
                    ->send(new EventReminderMail($ticket->customer, $event));

                $this->info('Sent reminder email to: ' . $ticket->customer_email);
            }
        }
    }
}

