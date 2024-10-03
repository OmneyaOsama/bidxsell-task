<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Event;
use App\Services\EventService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $eventService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->eventService = new EventService();
    }

    public function test_create_event()
    {
        $data = [
            'event_name' => 'Event 1',
            'event_date_time' => now(),
            'ticket_price' => 100,
            'venue' => 'Venue 1',
        ];

        $event = $this->eventService->createEvent($data);

        $this->assertInstanceOf(Event::class, $event);
        $this->assertDatabaseHas('events', ['event_name' => 'Event 1']);
    }

    public function test_update_event()
    {
        $event = Event::factory()->create();
        $updatedEvent = $this->eventService->updateEvent($event->id, ['event_name' => 'Updated Event']);

        $this->assertEquals('Updated Event', $updatedEvent->event_name);
        $this->assertDatabaseHas('events', ['event_name' => 'Updated Event']);
    }

    public function test_delete_event()
    {
        $event = Event::factory()->create();
        $this->eventService->deleteEvent($event->id);

        $this->assertDatabaseMissing('events', ['id' => $event->id]);
    }
}

