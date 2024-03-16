<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\CDs;

use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a User and Cart for each user
        $users = User::factory(10)->create();
        
        foreach ($users as $user) {
            $user->cart()->create();
        }

        CDs::factory(30)->create();
    }
}
