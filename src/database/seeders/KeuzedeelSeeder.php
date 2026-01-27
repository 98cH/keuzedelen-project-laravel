<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Keuzedeel;

class KeuzedeelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Periodes ophalen (voor nu alles in periode 1)
        $periode1 = 1;

        $keuzedelen = [
            ['code' => '25604K0059', 'titel' => 'ICT Support Technician', 'beschrijving' => 'In dit keuzedeel leer je hoe je professioneel communiceert met gebruikers, IT-vragen afhandelt en werkt volgens servicedeskprocedures.'],
            ['code' => '25604K0080', 'titel' => 'IT Servicedesk & Klantcommunicatie', 'beschrijving' => 'In dit keuzedeel leer je hoe je professioneel communiceert met gebruikers, IT-vragen afhandelt en werkt volgens servicedeskprocedures.'],
            ['code' => '25604K0210', 'titel' => 'Hardware Onderhoud & Reparatie', 'beschrijving' => 'Je leert computers en laptops demonteren, onderdelen vervangen en veelvoorkomende hardwareproblemen oplossen.'],
            ['code' => '25604K0497', 'titel' => 'Netwerkbeheer Basis', 'beschrijving' => 'Dit keuzedeel behandelt de basis van netwerken, zoals IP-adressen, routers, switches en het oplossen van eenvoudige netwerkstoringen.'],
            ['code' => '25604K0505', 'titel' => 'Besturingssystemen & Installaties', 'beschrijving' => 'Je leert besturingssystemen zoals Windows en Linux installeren, configureren en onderhouden voor eindgebruikers.'],
            ['code' => '25604K0722', 'titel' => 'Cybersecurity Basis', 'beschrijving' => 'In dit keuzedeel maak je kennis met digitale beveiliging, cyberdreigingen en hoe je systemen en gebruikers beter beschermt.'],
            ['code' => '25604K0730', 'titel' => 'Cloud & Remote Support', 'beschrijving' => 'Je leert werken met cloudoplossingen en ondersteuning op afstand, zoals remote desktop tools en online IT-diensten.'],
            ['code' => '25998K0497', 'titel' => 'Webdevelopment Verdieping (HTML, CSS, JavaScript)', 'beschrijving' => 'Je verdiept je in het bouwen van moderne, interactieve websites met HTML, CSS en JavaScript.'],
            ['code' => '25998K0722', 'titel' => 'Backend Development met PHP & Laravel', 'beschrijving' => 'Dit keuzedeel richt zich op het ontwikkelen van dynamische webapplicaties met PHP en het Laravel framework.'],
            ['code' => '25998K0788', 'titel' => 'Object Oriented Programming (OOP)', 'beschrijving' => 'Je leert programmeren met objecten en classes en past OOP-principes toe zoals inheritance en encapsulation.'],
            ['code' => 'K0205', 'titel' => 'Database Ontwerp & SQL', 'beschrijving' => 'In dit keuzedeel leer je databases ontwerpen en beheren en werk je met SQL-query’s om data op te slaan en op te vragen.'],
            ['code' => 'K0877', 'titel' => 'API Development & Integratie', 'beschrijving' => 'Je leert API’s ontwikkelen en gebruiken om applicaties met elkaar te laten communiceren.'],
        ];

        foreach ($keuzedelen as $keuzedeel) {
            Keuzedeel::updateOrCreate(
                ['keuzedeelcode' => $keuzedeel['code']],
                [
                    'titel' => $keuzedeel['titel'],
                    'beschrijving' => $keuzedeel['titel'] . ' (' . $keuzedeel['code'] . ")\n" . $keuzedeel['beschrijving'],
                    'max_inschrijvingen' => 30,
                    'actief' => true,
                    'periode_id' => $periode1,
                ]
            );
        }
    }
}
