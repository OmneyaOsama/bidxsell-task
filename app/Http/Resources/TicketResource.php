<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    public function toArray($request)
    {
        $categoryDetails = [];

        if ($this->category_type === 'App\Models\GeneralAdmissionTicket') {
            $categoryDetails = [
                'seat_preference' => $this->category->seat_preference,
            ];
        }

        if ($this->category_type === 'App\Models\VipAdmissionTicket') {
            $categoryDetails = [
                'backstage_access' => $this->category->backstage_access,
                'complimentary_drinks' => $this->category->complimentary_drinks,
            ];
        }

        if ($this->category_type === 'App\Models\GroupBookingTicket') {
            $categoryDetails = [
                'group_name' => $this->category->group_name,
                'special_requests' => $this->category->special_requests,
            ];
        }

        return [
            'id' => $this->id,
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
            'number_of_tickets' => $this->number_of_tickets,
            'category' => $this->category_type,
            'category_details' => $categoryDetails, // Category-specific details
        ];
    }
}
