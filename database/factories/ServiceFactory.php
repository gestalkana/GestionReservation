<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Service_types;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $nom = [
            'service XY',
            'Taleva Nest',
            'E-Taleva',
            'OP AMAZING',
            'WONDERFUL T',
        ];
        return [
            'nom' => fake()->randomElement($nom),
            'description' => fake()->text(),
            'service_type_id' => Service_types::inRandomOrder()->first()->id,
        ];
    }
}
