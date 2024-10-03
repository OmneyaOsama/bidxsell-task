<?php
namespace Database\Factories;

use App\Models\GroupBookingTicket;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupBookingTicketFactory extends Factory
{
    protected $model = GroupBookingTicket::class;

    public function definition()
    {
        return [
            'group_name' => $this->faker->company,
            'special_requests' => $this->faker->sentence,
        ];
    }
}


