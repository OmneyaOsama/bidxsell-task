<?php
namespace Database\Factories;

use App\Models\Ticket;
use App\Models\GeneralAdmissionTicket;
use App\Models\VipAdmissionTicket;
use App\Models\GroupBookingTicket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        $category = $this->faker->randomElement(['General', 'VIP', 'Group']);

        switch ($category) {
            case 'General':
                $categoryTicket = GeneralAdmissionTicket::factory()->create();
                break;

            case 'VIP':
                $categoryTicket = VipAdmissionTicket::factory()->create();
                break;

            case 'Group':
                $categoryTicket = GroupBookingTicket::factory()->create();
                break;
        }

        return [
            'event_id' => \App\Models\Event::factory(),
            'customer_name' => $this->faker->name,
            'customer_email' => $this->faker->unique()->safeEmail,
            'number_of_tickets' => $this->faker->numberBetween(1, 10),
            'category_id' => $categoryTicket->id,
            'category_type' => get_class($categoryTicket),
        ];
    }
}


