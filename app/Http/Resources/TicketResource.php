<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    public function toArray($request)
    {
        $ticket = [
            'id' => $this->id,
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
            'number_of_tickets' => $this->number_of_tickets,
            'category_type' => class_basename($this->category_type),
        ];

        switch ($this->category_type) {
            case 'App\Models\GeneralAdmissionTicket':
                $ticket['category_details'] = [
                    'seat_preference' => $this->category->seat_preference,
                ];
                break;

            case 'App\Models\VipAdmissionTicket':
                $ticket['category_details'] = [
                    'backstage_access' => $this->category->backstage_access,
                    'complimentary_drinks' => $this->category->complimentary_drinks,
                ];
                break;

            case 'App\Models\GroupBookingTicket':
                $ticket['category_details'] = [
                    'group_name' => $this->category->group_name,
                    'special_requests' => $this->category->special_requests,
                ];
                break;
        }

        return $ticket;
    }
}
