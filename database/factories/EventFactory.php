<?php
namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'event_name' => $this->faker->sentence,
            'event_date_time' => $this->faker->dateTimeBetween('now', '+1 year'),
            'ticket_price' => $this->faker->randomFloat(2, 10, 500),
            'venue' => $this->faker->city,
        ];
    }
}
