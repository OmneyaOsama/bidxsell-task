<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TicketFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_general_admission_ticket_purchase()
    {
        $event = Event::factory()->create();

        $response = $this->postJson('/api/tickets', [
            'event_id' => $event->id,
            'customer_name' => 'John Doe',
            'customer_email' => 'johndoe@example.com',
            'number_of_tickets' => 2,
            'category' => 'General',
            'seat_preference' => 'Front Row',
        ]);

        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'success',
                     'message',
                     'data' => [
                         'id',
                         'customer_name',
                         'customer_email',
                         'number_of_tickets',
                         'category_details' => ['seat_preference']
                     ]
                 ]);
    }

    public function test_vip_admission_ticket_purchase()
    {
        $event = Event::factory()->create();

        $response = $this->postJson('/api/tickets', [
            'event_id' => $event->id,
            'customer_name' => 'Jane Doe',
            'customer_email' => 'janedoe@example.com',
            'number_of_tickets' => 1,
            'category' => 'VIP',
            'backstage_access' => true,
            'complimentary_drinks' => true,
        ]);

        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'success',
                     'message',
                     'data' => [
                         'id',
                         'customer_name',
                         'customer_email',
                         'number_of_tickets',
                         'category_details' => ['backstage_access', 'complimentary_drinks']
                     ]
                 ]);
    }

    public function test_group_booking_ticket_purchase()
    {
        $event = Event::factory()->create();

        $response = $this->postJson('/api/tickets', [
            'event_id' => $event->id,
            'customer_name' => 'Group Booking',
            'customer_email' => 'group@example.com',
            'number_of_tickets' => 10,
            'category' => 'Group',
            'group_name' => 'Friends',
            'special_requests' => 'Wheelchair Access',
        ]);

        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'success',
                     'message',
                     'data' => [
                         'id',
                         'customer_name',
                         'customer_email',
                         'number_of_tickets',
                         'category_details' => ['group_name', 'special_requests']
                     ]
                 ]);
    }

    public function test_invalid_category_ticket_purchase()
    {
        $event = Event::factory()->create();

        $response = $this->postJson('/api/tickets', [
            'event_id' => $event->id,
            'customer_name' => 'Invalid Category',
            'customer_email' => 'invalid@example.com',
            'number_of_tickets' => 1,
            'category' => 'Invalid',
        ]);

        $response->assertStatus(400)
                 ->assertJson([
                     'success' => false,
                     'message' => 'Invalid category provided.',
                 ]);
    }
}

