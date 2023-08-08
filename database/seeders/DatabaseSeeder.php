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
        // \App\Models\User::factory(10)->create();
        $numberOfUsers = 20;

        for ($i = 0; $i < $numberOfUsers; $i++) {
            \App\Models\User::factory()->create([
                'name' => 'Test User',
                'username' => 'testuser' . $i,
               'email' => 'test'. $i .'@example.com',
               'password' => bcrypt('password'),
               'type' => 'user',
               'is_admin' => true,
               'status' => 'active',
           ]);
        }


    }
}
