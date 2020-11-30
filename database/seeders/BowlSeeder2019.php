<?php

namespace Database\Seeders;

use App\Models\Bowl;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class BowlSeeder2019 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bowls = Http::get('https://api.collegefootballdata.com/games?year=2019&seasonType=postseason')->json();

        foreach ($bowls as $key => $bowl) {
            Bowl::create([
               'api_id' => $bowl['id'],
               'season' => $bowl['season'],
               'start_date' => Carbon::create($bowl['start_date'])->toDateTimeString(),
               'home_id' => $bowl['home_id'],
               'visitor_id' => $bowl['away_id'],
               'home_score' => $bowl['home_points'],
               'visitor_score' => $bowl['away_points'],
            ]);
        }
    }
}
