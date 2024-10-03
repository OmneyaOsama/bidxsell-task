<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\GeneralAdmissionTicket;
use App\Models\Ticket;
use App\Services\GeneralAdmissionService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GeneralAdmissionServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $generalAdmissionService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->generalAdmissionService = new GeneralAdmissionService();
    }

    public function test_create_general_admission_ticket()
    {
        $data = [
            'event_id' => 1,
            'customer_name' => 'John Doe',
            'customer_email' => 'john@example.com',
            'number_of_tickets' => 2,
            'seat_preference' => 'Front Row',
        ];

        $ticket = $this->generalAdmissionService->createTicket($data);

        $this->assertInstanceOf(Ticket::class, $ticket);
        $this->assertDatabaseHas('general_admission_tickets', ['seat_preference' => 'Front Row']);
        $this->assertDatabaseHas('tickets', ['customer_name' => 'John Doe']);
    }
}
