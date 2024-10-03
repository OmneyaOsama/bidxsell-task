<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    public function test_event_can_be_created()
    {
        $event = Event::create([
            'event_name' => 'Sample Event',
            'event_date_time' => now(),
            'ticket_price' => 100,
            'venue' => 'Sample Venue'
        ]);

        $this->assertDatabaseHas('events', ['event_name' => 'Sample Event']);
    }

    public function test_event_can_be_updated()
    {
        $event = Event::factory()->create();

        $event->update([
            'event_name' => 'Updated Event',
            'ticket_price' => 200,
        ]);

        $this->assertDatabaseHas('events', ['event_name' => 'Updated Event', 'ticket_price' => 200]);
    }

    public function test_event_can_be_deleted()
    {
        $event = Event::factory()->create();
        $event->delete();

        $this->assertDatabaseMissing('events', ['id' => $event->id]);
    }
}
