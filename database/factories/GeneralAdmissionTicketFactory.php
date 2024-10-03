<?php

namespace Database\Factories;

use App\Models\GeneralAdmissionTicket;
use Illuminate\Database\Eloquent\Factories\Factory;

class GeneralAdmissionTicketFactory extends Factory
{
    protected $model = GeneralAdmissionTicket::class;

    public function definition()
    {
        return [
            'seat_preference' => $this->faker->randomElement(['Front Row', 'Middle Row', 'Back Row']),
        ];
    }
}

