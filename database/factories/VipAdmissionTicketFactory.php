<?php
namespace Database\Factories;

use App\Models\VipAdmissionTicket;
use Illuminate\Database\Eloquent\Factories\Factory;

class VipAdmissionTicketFactory extends Factory
{
    protected $model = VipAdmissionTicket::class;

    public function definition()
    {
        return [
            'backstage_access' => $this->faker->boolean,
            'complimentary_drinks' => $this->faker->boolean,
        ];
    }
}


