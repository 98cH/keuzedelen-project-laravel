<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Periode;

class PeriodeSeeder extends Seeder
{
    public function run(): void
    {
        Periode::create([
            'naam' => 'Periode 1',
            'startdatum' => '2026-01-01',
            'einddatum' => '2026-03-31',
            'inschrijving_open' => true,
        ]);
        Periode::create([
            'naam' => 'Periode 2',
            'startdatum' => '2026-04-01',
            'einddatum' => '2026-06-30',
            'inschrijving_open' => true,
        ]);
        Periode::create([
            'naam' => 'Periode 3',
            'startdatum' => '2026-07-01',
            'einddatum' => '2026-09-30',
            'inschrijving_open' => true,
        ]);
        Periode::create([
            'naam' => 'Periode 4',
            'startdatum' => '2026-10-01',
            'einddatum' => '2026-12-31',
            'inschrijving_open' => true,
        ]);
    }
}
