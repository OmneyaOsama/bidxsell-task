<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;

class EventFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_event_listing()
    {
        $response = $this->get('/api/events/');

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
            'event_date_time' => Carbon::parse(now())->format('Y-m-d H:i:s'),
            'ticket_price' => 150,
            'venue' => 'Venue 1'
        ]);

        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'success', 'message', 'data' => ['event_name', 'event_date_time', 'ticket_price', 'venue']
                 ]);
    }




}
