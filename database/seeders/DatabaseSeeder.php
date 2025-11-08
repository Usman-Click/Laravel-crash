<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //  User::factory(5)->create();

        $user =  User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Listing::factory(10)->create([
            'user_id' => $user->id, // add the user statically for testing
        ]);
    }
}
