<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Season;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Season::Create([
            'season' => 2019
        ]);

        Season::Create([
            'season' => 2020
        ]);
    }
}
