<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\GroupBookingTicket;
use App\Models\Ticket;
use App\Services\GroupBookingService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GroupBookingServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $groupBookingService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->groupBookingService = new GroupBookingService();
    }

    public function test_create_group_booking_ticket()
    {
        $data = [
            'event_id' => 1,
            'group_name' => 'Friends Group',
            'special_requests' => 'Wheelchair Access',
            'number_of_tickets' => 10,
        ];

        $ticket = $this->groupBookingService->createTicket($data);

        $this->assertInstanceOf(Ticket::class, $ticket);
        $this->assertDatabaseHas('group_booking_tickets', ['group_name' => 'Friends Group']);
        $this->assertDatabaseHas('tickets', ['number_of_tickets' => 10]);
    }
}
