<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Super Admin User',
            'email' => 'majbaulhaque3234@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'super-admin',
            'phone' => '01764092737',
            'gender' => 'male',
            'address' => 'rajbari',
        ]);
    }
}
