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
               'home_quarter_one_score' => $bowl['home_line_scores']['0'] ?? 0,
               'home_quarter_two_score' => $bowl['home_line_scores']['1'] ?? 0,
               'home_quarter_three_score' => $bowl['home_line_scores']['2'] ?? 0,
               'home_quarter_four_score' => $bowl['home_line_scores']['3'] ?? 0,
               'visitor_quarter_one_score' => $bowl['away_line_scores']['0'] ?? 0,
               'visitor_quarter_two_score' => $bowl['away_line_scores']['1'] ?? 0,
               'visitor_quarter_three_score' => $bowl['away_line_scores']['2'] ?? 0,
               'visitor_quarter_four_score' => $bowl['away_line_scores']['3'] ?? 0,
            ]);
    }
}
