<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            ['name' => 'Governor', 'maximum_candidates' => 1],
            ['name' => 'Vice Governor', 'maximum_candidates' => 1],
            ['name' => 'Board Member', 'maximum_candidates' => 10],
            ['name' => 'Mayor', 'maximum_candidates' => 1],
            ['name' => 'Vice Mayor', 'maximum_candidates' => 1],
            ['name' => 'City Councilor', 'maximum_candidates' => 10],
        ];

        foreach ($positions as $position) {
            DB::table('positions')->insert([
                'name' => $position['name'],
                'maximum_candidates' => $position['maximum_candidates'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
