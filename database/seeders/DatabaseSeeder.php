<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(InstitutoSeeder::class);
        $this->call(CarreraSeeder::class);
        $this->call(SemestreSeeder::class);
        $this->call(TestSeeder::class);
        $this->call(PreguntaSeeder::class);
        $this->call(OpcionSeeder::class);
    }
}
