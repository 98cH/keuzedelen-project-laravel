<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Opleiding;

class OpleidingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Opleiding::create(['naam' => 'ICT Support Technician']); // id = 1
        Opleiding::create(['naam' => 'Software Developer']);     // id = 2
    }
}
