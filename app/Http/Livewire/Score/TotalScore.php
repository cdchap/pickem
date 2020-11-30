<?php

namespace App\Http\Livewire\Score;

use Livewire\Component;

use App\Models\User;
use App\Models\Pick;
use Illuminate\Support\Arr;

class TotalScore extends Component
{

    public $users;
    public $userScores;
    public $picks;

    public function mount()
    {
        $this->picks = Pick::where('season_id', 1)->with(['user', 'bowl', 'team'])->orderBy('user_id', 'asc')->get();
        $this->users = User::all();

        // total each users scores and turn that into a collection
        $this->userScores = $this->sumConfidencePicks($this->users, $this->picks);
        $this->userScores = collect($this->userScores);
        $this->userScores = $this->userScores->sortByDesc('score');
        $this->userScores = $this->userScores->values();

    }

    public function sumConfidencePicks($users, $picks) {
        
        $scores = [];

        foreach ($users as $key => $user) {
            $score = 0;
            $firstPick = $picks->where('user_id', $user->id)->first();
            foreach ($picks as $key => $pick) {
                if(isset($pick->bowl->winner) && $pick->user_id == $user->id) {
                    if($pick->team_id == $pick->bowl->winner->api_id) {
                        $score = $score + $pick->confidence;
                    }
                }
            }
            array_push($scores, [
                'user_id' => $user->id,
                'username' => $user->username,
                'score' => $score,
                'pick_date' => $firstPick->created_at ?? $user->created_at
            ]);
        }

        return $scores;
    }

    public function render()
    {
        return view('livewire.score.total-score');
    }
}
