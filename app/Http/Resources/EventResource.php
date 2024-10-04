<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'event_name' => $this->event_name,
            'event_date_time' => $this->event_date_time,
            'ticket_price' => $this->ticket_price,
            'venue' => $this->venue,
            'tickets' => TicketResource::collection($this->whenLoaded('tickets')),

        ];
    }
}
