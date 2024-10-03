<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Ticket;
use App\Models\GeneralAdmissionTicket;
use App\Models\VipAdmissionTicket;
use App\Models\GroupBookingTicket;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TicketTest extends TestCase
{
    use RefreshDatabase;

    public function test_ticket_has_general_admission_category()
    {
        $generalAdmission = GeneralAdmissionTicket::factory()->create();
        $ticket = Ticket::factory()->create([
            'category_id' => $generalAdmission->id,
            'category_type' => GeneralAdmissionTicket::class,
        ]);

        $this->assertInstanceOf(GeneralAdmissionTicket::class, $ticket->category);
    }

    public function test_ticket_has_vip_admission_category()
    {
        $vipAdmission = VipAdmissionTicket::factory()->create();
        $ticket = Ticket::factory()->create([
            'category_id' => $vipAdmission->id,
            'category_type' => VipAdmissionTicket::class,
        ]);

        $this->assertInstanceOf(VipAdmissionTicket::class, $ticket->category);
    }

    public function test_ticket_has_group_booking_category()
    {
        $groupBooking = GroupBookingTicket::factory()->create();
        $ticket = Ticket::factory()->create([
            'category_id' => $groupBooking->id,
            'category_type' => GroupBookingTicket::class,
        ]);

        $this->assertInstanceOf(GroupBookingTicket::class, $ticket->category);
    }
}
