<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\Film;
use App\Models\Timeline;
use App\Models\Release_date;
use App\Models\Ticket;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timeline>
 */
class TimelineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $filmIds = Film::pluck('id')->toArray();
        $dateIds = Release_date::pluck('id')->toArray();
        $randomFilmId = fake()->randomElement($filmIds);
        $randomdateId = fake()->randomElement($dateIds);
        
        $today = now()->format('Y-m-d'); 
        $hour = fake()->numberBetween(0, 23); 
        $timeline = $today . ' ' . $hour . ':00:00';
        $timeline = Timeline::create([
            'timeline' => $timeline,
            'film_id'=>$randomFilmId,
            'release_id'=>$randomdateId,
            
        ]);
        Ticket::factory(50)->create([
            'timeline_id' => $timeline->id,
            'film_id' => $timeline->film_id,
        ]);
        return $timeline;
    }
}
