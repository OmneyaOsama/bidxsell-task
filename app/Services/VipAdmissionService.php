<?php

namespace App\Services;

use App\Models\VipAdmissionTicket;
use App\Models\Ticket;

class VipAdmissionService
{
    public function createTicket($data)
    {
        $vipTicket = VipAdmissionTicket::create([
            'backstage_access' => $data['backstage_access'],
            'complimentary_drinks' => $data['complimentary_drinks'],
        ]);

        $ticket = Ticket::create([
            'event_id' => $data['event_id'],
            'customer_name' => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'number_of_tickets' => $data['number_of_tickets'],
            'category_id' => $vipTicket->id,
            'category_type' => VipAdmissionTicket::class
        ]);

        return $ticket;
    }
}
