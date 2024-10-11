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
            'name' => 'Brian Alonso Valles Vela',
            'email' => 'briansitovalles@gmail.com',
            'password' => bcrypt('Hol4Mund0#123')
        ]);

        $this->call([
            CategorySeeder::class,
            LevelSeeder::class,
            PriceSeeder::class,
        ]);
    }
}
