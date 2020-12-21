<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Bowl;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class BowlSeeder2020 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bowls = Http::get('https://api.collegefootballdata.com/games?year=2020&seasonType=postseason')->json();

        foreach ($bowls as $key => $bowl) {
            Bowl::create([
               'api_id' => $bowl['id'],
               'season' => $bowl['season'],
               'start_date' => Carbon::create($bowl['start_date'])->toDateTimeString(),
               'home_id' => $bowl['home_id'],
               'visitor_id' => $bowl['away_id'],
               'home_score' => $bowl['home_points'] ?? 0,
               'visitor_score' => $bowl['away_points'] ?? 0,
            ]);
        }
    }
}
