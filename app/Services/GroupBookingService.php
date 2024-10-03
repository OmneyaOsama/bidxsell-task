<?php

namespace App\Services;

use App\Models\GroupBookingTicket;
use App\Models\Ticket;

class GroupBookingService
{
    public function createTicket($data)
    {
        $groupTicket = GroupBookingTicket::create([
            'group_name' => $data['group_name'],
            'special_requests' => $data['special_requests'],
        ]);

        $ticket = Ticket::create([
            'event_id' => $data['event_id'],
            'customer_name' => 'Group Leader',
            'customer_email' => 'group@example.com',
            'number_of_tickets' => $data['number_of_tickets'],
            'category_id' => $groupTicket->id,
            'category_type' => GroupBookingTicket::class
        ]);

        return $ticket;
    }
}
