<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service_types;

class Service_typesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Service_types::factory()
        ->count(5)
        ->sequence(
            ['nom' => 'hebergement'],
            ['nom' => 'restauration'],
            ['nom' => 'evenement'],
            ['nom' => 'spa'],
            ['nom' => 'transport'],
        )
        ->create();
    }
}
