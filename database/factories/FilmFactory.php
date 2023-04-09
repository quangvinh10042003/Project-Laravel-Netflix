<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'ARCANE',
            'category' => 'Hành động, Hoạt hình',
            'actor' => 'Jinx, Ekko, Vi, Jayce, Viktor',
            'image' => 'phim5.jpg',
            'content' => 'Làm game để quảng cáo film',
            'producer' => 'Riot Games',
            'time' => '250',
        ];
    }
}
