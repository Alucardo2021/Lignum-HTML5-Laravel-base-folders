<?php

namespace Database\Factories;

use App\Models\Actor;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelicula>
 */
class PeliculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        \App\Models\Actor::factory(1)->create()->get('ActorID');
        return [
            'Titulo' => fake()->words(random_int(1, 3), true),
            'Año' => fake()->numberBetween(1895,Carbon::today()->format('Y')),
            'Duracion' => fake()->numberBetween(1,600),
            'Sinopsis' => fake()->text(),
            'Imagen' => fake()->filePath(),
            'ActorPrincipalID' => Actor::all()->random()->ActorID
        ];
    }
}
