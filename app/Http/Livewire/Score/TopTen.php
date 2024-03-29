<?php

namespace App\Http\Livewire\Score;

use Livewire\Component;

use App\Models\User;
use App\Models\Pick;
use Illuminate\Support\Arr;

class TopTen extends Component
{
    // get all of the picks for each user from the database, with bowls
    // sum all of the confidence points by checking to see if they match the bowl winners
    public $users;
    public $season = 2021;
    public $userScores;
    public $picks;

    public function mount()
    {
        $this->picks = Pick::where('season', $this->season)->with(['user', 'bowl', 'team'])->orderBy('user_id', 'asc')->get();
        $this->users = User::all();

        // total each users scores and turn that into a collection
        $this->userScores = $this->sumConfidencePicks($this->users, $this->picks);
        $this->userScores = collect($this->userScores);
        $this->userScores = $this->userScores->sortByDesc('score');
        $this->userScores = $this->userScores->values();
        $this->userScores = $this->userScores->take(10);


    }

    public function sumConfidencePicks($users, $picks) {
        
        $scores = [];

        foreach ($users as $key => $user) {
            $score = 0;
            $correctPicks = [];
            $firstPick = $picks->where('user_id', $user->id)->first();
            foreach ($picks as $key => $pick) {
                if(isset($pick->bowl->winner) && $pick->user_id == $user->id) {
                    if($pick->team_id == $pick->bowl->winner->api_id) {
                        $correctPicks = Arr::prepend($correctPicks, $pick->confidence ?? 0);
                        $score = $score + $pick->confidence;
                    }
                }
            }

        $correctPicks = array_filter($correctPicks, function($value) {
                return $value > 0;
            });
        $correctPicks = array_reverse(Arr::sort($correctPicks)); 

        $championshipPick = $picks->where('bowl.championship', true);
        $highScore = reset($correctPicks);

        
        foreach($championshipPick as $pick) {
            if(isset($pick->bowl->winner) && $pick->team_id == $pick->bowl->winner->api_id) {
                $score = $score + $highScore;
            }
            
        }
        
            array_push($scores, [
                'username' => $user->username,
                'score' => $score,
                'pick_date' => $firstPick->created_at ?? $user->created_at
            ]);
        }

        return $scores;
    }

    public function render()
    {
        return view('livewire.score.top-ten');
    }
}
