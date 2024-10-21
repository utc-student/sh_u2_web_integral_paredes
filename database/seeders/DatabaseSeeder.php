<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// Illuminate\Database\Eloquent\Factories\HasFactory

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::create([
            'name' => 'Brian Alonso Valles Vela',
            'email' => 'briansitovalles@gmail.com',
            'password' => bcrypt('Hol4Mund0#123')
        ]);
        
        $this->call([
            CategorySeeder::class,
            LevelSeeder::class,
            PriceSeeder::class,
        ]);
        User::factory(1)->create();
    }
}
