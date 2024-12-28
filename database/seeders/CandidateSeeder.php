<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidates = [
            // Governor Candidates
            ['first_name' => 'Dan', 'last_name' => 'Fernandez', 'alias' => 'Dan', 'position_id' => 1], // Governor
            ['first_name' => 'Ruth', 'last_name' => 'Mariano-Hernandez', 'alias' => 'Ruth', 'position_id' => 1], // Governor
            ['first_name' => 'Karen', 'last_name' => 'Agapay', 'alias' => 'Karen', 'position_id' => 1], // Governor
            ['first_name' => 'Sol', 'last_name' => 'Aragones', 'alias' => 'Sol', 'position_id' => 1], // Governor

            // Vice Governor Candidates
            ['first_name' => 'Gem', 'last_name' => 'Castillo-Amante', 'alias' => 'Gem', 'position_id' => 2], // Vice Governor
            ['first_name' => 'Peewee', 'last_name' => 'Perez', 'alias' => 'Peewee', 'position_id' => 2], // Vice Governor
            ['first_name' => 'JM', 'last_name' => 'Carait', 'alias' => 'JM', 'position_id' => 2], // Vice Governor
            ['first_name' => 'Jerico', 'last_name' => 'Ejercito', 'alias' => 'Jerico', 'position_id' => 2], // Vice Governor
            ['first_name' => 'Mary', 'last_name' => 'Buera', 'alias' => 'Mary', 'position_id' => 2], // Vice Governor
            ['first_name' => 'Lorenzo', 'last_name' => 'Zuñiga Jr.', 'alias' => 'Lorenzo', 'position_id' => 2], // Vice Governor

            // Mayor Candidates
            ['first_name' => 'Arlene', 'last_name' => 'Arcillas', 'alias' => 'Arlene', 'position_id' => 3], // Mayor

            // Vice Mayor Candidates
            ['first_name' => 'Arnold', 'last_name' => 'Arcillas', 'alias' => 'Arnold', 'position_id' => 4], // Vice Mayor

            // City Councilor Candidates
            ['first_name' => 'Ma. Theresa', 'last_name' => 'Aala', 'alias' => 'Tess', 'position_id' => 5],
            ['first_name' => 'Sonia', 'last_name' => 'Algabre', 'alias' => 'Sonia', 'position_id' => 5],
            ['first_name' => 'Roy', 'last_name' => 'Gonzales', 'alias' => 'Roy', 'position_id' => 5],
            ['first_name' => 'Laudemer', 'last_name' => 'Carta', 'alias' => 'Laudemer', 'position_id' => 5],
            ['first_name' => 'Jose', 'last_name' => 'Catindig Jr.', 'alias' => 'Joey', 'position_id' => 5],
            ['first_name' => 'Mythor', 'last_name' => 'Cendaña', 'alias' => 'Mythor', 'position_id' => 5],
            ['first_name' => 'Jose Joel', 'last_name' => 'Aala', 'alias' => 'Joel', 'position_id' => 5],
            ['first_name' => 'Antonio', 'last_name' => 'Tuzon Jr.', 'alias' => 'Tony', 'position_id' => 5],
            ['first_name' => 'Rodrigo', 'last_name' => 'Malapitan', 'alias' => 'Rod', 'position_id' => 5],
            ['first_name' => 'Ina Clariza', 'last_name' => 'Cartagena', 'alias' => 'Ina', 'position_id' => 5],
            ['first_name' => 'Manuel', 'last_name' => 'Alipon', 'alias' => 'Manny', 'position_id' => 5],
            ['first_name' => 'Wilfredo', 'last_name' => 'Castro', 'alias' => 'Willie', 'position_id' => 5],
        ];

        foreach ($candidates as $candidate) {
            DB::table('candidates')->insert([
                'first_name' => $candidate['first_name'],
                'last_name' => $candidate['last_name'],
                'alias' => $candidate['alias'],
                'position_id' => $candidate['position_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
