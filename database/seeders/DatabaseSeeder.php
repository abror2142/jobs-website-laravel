<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\JobSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {   
        $this->call(JobSeeder::class);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
    