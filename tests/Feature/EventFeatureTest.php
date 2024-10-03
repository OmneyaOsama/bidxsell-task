<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_event_listing()
    {
        $response = $this->get('/api/events');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'success', 'message', 'data' => [
                         '*' => ['id', 'event_name', 'event_date_time', 'ticket_price', 'venue']
                     ]
                 ]);
    }

    public function test_event_creation()
    {
        $response = $this->postJson('/api/events/store', [
            'event_name' => 'New Event',
            'event_date_time' => now(),
            'ticket_price' => 150,
            'venue' => 'Venue 1'
        ]);

        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'success', 'message', 'data' => ['event_name', 'event_date_time', 'ticket_price', 'venue']
                 ]);
    }

    public function test_event_updating()
    {
        $event = Event::factory()->create();

        $response = $this->putJson("/api/events/update/{$event->id}", [
            'event_name' => 'Updated Event',
            'ticket_price' => 200
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                     'message' => 'Event updated successfully.',
                     'data' => ['event_name' => 'Updated Event', 'ticket_price' => 200]
                 ]);
    }

    public function test_event_deleting()
    {
        $event = Event::factory()->create();

        $response = $this->deleteJson("/api/events/delete/{$event->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                     'message' => 'Event deleted successfully.',
                 ]);
    }
}
