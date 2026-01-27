<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Student 1
        User::create([
            'name' => 'Student1',
            'email' => 'student1@example.com',
            'password' => Hash::make('password'),
            'role' => 'student',
            'opleiding_id' => 1, // Pas aan naar een bestaand opleiding_id
        ]);

        // Student 2
        User::create([
            'name' => 'Student2',
            'email' => 'student2@example.com',
            'password' => Hash::make('password'),
            'role' => 'student',
            'opleiding_id' => 2, // Pas aan naar een bestaand opleiding_id
        ]);

        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'opleiding_id' => null,
        ]);

        // SLB
        User::create([
            'name' => 'SLB',
            'email' => 'slb@example.com',
            'password' => Hash::make('password'),
            'role' => 'slb',
            'opleiding_id' => null,
        ]);
    }
}
