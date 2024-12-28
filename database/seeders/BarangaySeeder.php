<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barangays = [
            ['name' => 'Balibago', 'code' => '043405001'], // PSGC Code
            ['name' => 'Dita', 'code' => '043405002'],
            ['name' => 'Don Jose', 'code' => '043405003'],
            ['name' => 'Ibaba', 'code' => '043405004'],
            ['name' => 'Labas', 'code' => '043405005'],
            ['name' => 'Malitlit', 'code' => '043405006'],
            ['name' => 'Market Area', 'code' => '043405007'],
            ['name' => 'Pooc', 'code' => '043405008'],
            ['name' => 'Pulong Santa Cruz', 'code' => '043405009'],
            ['name' => 'Sinalhan', 'code' => '043405010'],
            ['name' => 'Tagapo', 'code' => '043405011'],
            ['name' => 'Macabling', 'code' => '043405012'],
        ];

        foreach ($barangays as $barangay) {
            DB::table('barangays')->insert([
                'name' => $barangay['name'],
                'code' => $barangay['code'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
