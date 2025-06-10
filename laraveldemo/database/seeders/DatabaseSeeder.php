<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // ✅ لازم يكون هون فوق

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Test User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
