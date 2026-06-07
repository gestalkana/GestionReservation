<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Gabriel Andriamahafaly',
            'email' => 'gestalkana@gmail.com',
        ]);
        $this->call(ClientSeeder::class);
        $this->call(Service_typesSeeder::class);
        $this->call(ServiceSeeder::class);
    }
}
