<?php

namespace Database\Factories;

use App\Models\Bowl;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class BowlFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bowl::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $channels = ['ABC', 'ESPN', 'ESPN2', 'NBC', 'FOX', 'CBS'];
        $home = rand(1, 128);
        $visiting = rand(1, 128); 
        
        do {
           $visiting = rand(1,128);
        } while ($visiting == $home);

        return [
            'name' => $this->faker->company . " Bowl",
            'season_id' => 1,
            'channel' => Arr::random($channels),
            'kickoff' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'date' => $this->faker->dateTimeThisYear($max = 'now', $timezone = 'America/Chicago'),
            'home_id' => $home,
            'visitor_id' => $visiting,
        ];
    }
}
