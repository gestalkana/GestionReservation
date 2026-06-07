<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service_types>
 */
class Service_typesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = [
            'hebergement',
            'restauration',
            'evenement',
            'spa',
            'transport',
        ];
        return [
            'nom' => fake()->randomElement($types),
        ];
    }
}
