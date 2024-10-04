<?php
namespace App\Services;

use App\Models\Event;

class EventService
{
    public function getAllEvents()
    {
        return Event::with('tickets.category')->get();
    }

    public function getEventById($id)
    {
        return Event::with('tickets.category')->findOrFail($id);
    }

    public function createEvent($data)
    {
        return Event::create($data);
    }

   
}
