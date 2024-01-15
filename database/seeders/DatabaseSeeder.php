<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(8)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => 'Password!321',
            'role' => 'admin',
            'dob' => '1990-01-01',
            'bio' => 'This is the admin.',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@ehb.be',
            'password' => 'Password!321',
            'role' => 'user',
            'dob' => '1990-01-01',
            'bio' => 'This is the user.',
        ]);
    }
}
