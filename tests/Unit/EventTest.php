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

   


}
