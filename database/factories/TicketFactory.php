<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Timeline;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'timeline_id' => function () {
                return factory(Timeline::class)->create()->id;
            },
            'film_id' => function (array $ticket) {
                $timeline = Timeline::find($ticket['timeline_id']);
                return $timeline ? $timeline->film_id : null;
            },
            'number' => function ()  {
                return fake()->unique()->numberBetween(1, 50);
            },
        ];
    }
}
