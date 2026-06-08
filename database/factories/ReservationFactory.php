<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;
use App\Models\Service;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = [
            'en_attente',
            'confirmee',
            'annulee',
            'terminee'
        ];
        return [
            'client_id' => Client::inRandomOrder()->first()->id,
            'service_id' => Service::inRandomOrder()->first()->id,
            'reservation_date' => fake()->dateTimeBetween('now', '+3 months')->format('Y-m-d'),
            'note' => fake()->sentence(),
            'status' => fake()->randomElement($status),
        ];
    }
}
