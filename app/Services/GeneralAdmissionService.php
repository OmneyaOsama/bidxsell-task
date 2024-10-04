<?php

namespace App\Services;

use App\Models\GeneralAdmissionTicket;
use App\Models\Ticket;

class GeneralAdmissionService
{
    public function createTicket( $data)
    {
        $generalTicket = GeneralAdmissionTicket::create([
            'seat_preference' => $data['seat_preference']
        ]);

        $ticket = Ticket::create([
            'event_id' => $data['event_id'],
            'customer_name' => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'number_of_tickets' => $data['number_of_tickets'],
            'category_id' => $generalTicket->id,
            'category_type' => GeneralAdmissionTicket::class
        ]);

        return $ticket;
    }
}
