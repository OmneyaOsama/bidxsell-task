<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\VipAdmissionTicket;
use App\Models\Ticket;
use App\Services\VipAdmissionService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VipAdmissionServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $vipAdmissionService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->vipAdmissionService = new VipAdmissionService();
    }

    public function test_create_vip_admission_ticket()
    {
        $data = [
            'event_id' => 1,
            'customer_name' => 'Jane Doe',
            'customer_email' => 'jane@example.com',
            'number_of_tickets' => 1,
            'backstage_access' => true,
            'complimentary_drinks' => true,
        ];

        $ticket = $this->vipAdmissionService->createTicket($data);

        $this->assertInstanceOf(Ticket::class, $ticket);
        $this->assertDatabaseHas('vip_admission_tickets', ['backstage_access' => true, 'complimentary_drinks' => true]);
        $this->assertDatabaseHas('tickets', ['customer_name' => 'Jane Doe']);
    }
}
