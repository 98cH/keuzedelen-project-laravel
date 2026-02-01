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

        $ictOpleidingId = 1;
        $devOpleidingId = 2;
        $keuzedelen = [
            // 6 keuzedelen voor ICT Support Technician
            ['code' => '25604K0059', 'titel' => 'ICT Support Technician', 'opleiding_id' => $ictOpleidingId, 'beschrijving' => 'In dit keuzedeel leer je hoe je professioneel communiceert met gebruikers, IT-vragen afhandelt en werkt volgens servicedeskprocedures.'],
            ['code' => '25604K0080', 'titel' => 'IT Servicedesk & Klantcommunicatie', 'opleiding_id' => $ictOpleidingId, 'beschrijving' => 'In dit keuzedeel leer je hoe je professioneel communiceert met gebruikers, IT-vragen afhandelt en werkt volgens servicedeskprocedures.'],
            ['code' => '25604K0210', 'titel' => 'Hardware Onderhoud & Reparatie', 'opleiding_id' => $ictOpleidingId, 'beschrijving' => 'Je leert computers en laptops demonteren, onderdelen vervangen en veelvoorkomende hardwareproblemen oplossen.'],
            ['code' => '25604K0497', 'titel' => 'Netwerkbeheer Basis', 'opleiding_id' => $ictOpleidingId, 'beschrijving' => 'Dit keuzedeel behandelt de basis van netwerken, zoals IP-adressen, routers, switches en het oplossen van eenvoudige netwerkstoringen.'],
            ['code' => '25604K0505', 'titel' => 'Besturingssystemen & Installaties', 'opleiding_id' => $ictOpleidingId, 'beschrijving' => 'Je leert besturingssystemen zoals Windows en Linux installeren, configureren en onderhouden voor eindgebruikers.'],
            ['code' => '25604K0722', 'titel' => 'Cybersecurity Basis', 'opleiding_id' => $ictOpleidingId, 'beschrijving' => 'In dit keuzedeel maak je kennis met digitale beveiliging, cyberdreigingen en hoe je systemen en gebruikers beter beschermt.'],
            // 6 keuzedelen voor Software Developer
            ['code' => '25998K0497', 'titel' => 'Webdevelopment Verdieping (HTML, CSS, JavaScript)', 'opleiding_id' => $devOpleidingId, 'beschrijving' => 'Je verdiept je in het bouwen van moderne, interactieve websites met HTML, CSS en JavaScript.'],
            ['code' => '25998K0722', 'titel' => 'Backend Development met PHP & Laravel', 'opleiding_id' => $devOpleidingId, 'beschrijving' => 'Dit keuzedeel richt zich op het ontwikkelen van dynamische webapplicaties met PHP en het Laravel framework.'],
            ['code' => '25998K0788', 'titel' => 'Object Oriented Programming (OOP)', 'opleiding_id' => $devOpleidingId, 'beschrijving' => 'Je leert programmeren met objecten en classes en past OOP-principes toe zoals inheritance en encapsulation.'],
            ['code' => '25998K0210', 'titel' => 'Software Testing & QA', 'opleiding_id' => $devOpleidingId, 'beschrijving' => 'Je leert software testen, testplannen maken en werken met testautomatisering.'],
            ['code' => '25998K0505', 'titel' => 'DevOps & Deployment', 'opleiding_id' => $devOpleidingId, 'beschrijving' => 'Je leert over CI/CD, deployment pipelines en het automatiseren van softwarelevering.'],
            ['code' => '25998K0730', 'titel' => 'Cloud Development', 'opleiding_id' => $devOpleidingId, 'beschrijving' => 'Je leert cloudapplicaties ontwikkelen en werken met cloudplatforms zoals Azure of AWS.'],
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
                    'opleiding_id' => $keuzedeel['opleiding_id'],
                ]
            );
        }
    }
}