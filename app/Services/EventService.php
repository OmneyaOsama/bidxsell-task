<?php
namespace App\Services;

use App\Models\Event;

class EventService
{
    public function getAllEvents()
    {
        return Event::all();
    }

    public function getEventById($id)
    {
        return Event::findOrFail($id);
    }

    public function createEvent($data)
    {
        return Event::create($data);
    }

    public function updateEvent($id, $data)
    {
        $event = Event::findOrFail($id);
        $event->update($data);
        return $event;
    }

    public function deleteEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return $event;
    }
}
