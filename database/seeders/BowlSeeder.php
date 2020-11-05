<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bowl;

class BowlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bowl::create(['name' => 'Tropical Smoothie Bowl', 'season_id' => 1, 'channel' => 'ESPN', 'kickoff' => '19:00:00', 'date' => '2020-12-19']);
        Bowl::create(['name' => 'Myrtle Beach Bowl', 'season_id' => 1, 'channel' => 'ESPN', 'kickoff' => '14:30:00', 'date' => '2020-12-21']);
        Bowl::create(['name' => 'Famous Idaho Potato Bowl', 'season_id' => 1, 'channel' => 'ESPN', 'kickoff' => '15:30:00', 'date' => '2020-12-22']);
        Bowl::create(['name' => 'Boca Raton Bowl', 'season_id' => 1, 'channel' => 'ESPN', 'kickoff' => '19:00:00', 'date' => '2020-12-22']);
        Bowl::create(['name' => 'R + L Carriers Bowl', 'season_id' => 1, 'channel' => 'ESPN', 'kickoff' => '15:30:00', 'date' => '2020-12-23']);
        Bowl::create(['name' => 'Montgomery Bowl', 'season_id' => 1, 'channel' => 'ESPN2', 'kickoff' => '17:00:00', 'date' => '2020-12-23']);
        Bowl::create(['name' => 'New Mexico Bowl', 'season_id' => 1, 'channel' => 'ESPN', 'kickoff' => '15:30:00', 'date' => '2020-12-24']);
        Bowl::create(['name' => 'Camellia Bowl', 'season_id' => 1, 'channel' => 'ESPN', 'kickoff' => '14:30:00', 'date' => '2020-12-25']);
        Bowl::create(['name' => 'Union Home Mortgage Bowl', 'season_id' => 1, 'channel' => 'ESPN', 'kickoff' => '14:00:00', 'date' => '2020-12-26']);
        
    }
}
