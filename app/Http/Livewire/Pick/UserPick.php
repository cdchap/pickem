<?php

namespace App\Http\Livewire\Pick;

use App\Models\Pick;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Arr;

class UserPick extends Component
{
    public $userName;
    public $userId;
    public $pointTotal = 0;
    public $season = 2021;

    public function mount(User $user)
    {
        $this->userName = $user->username;
        $this->userId = $user->id;
        $picks = Pick::where(['user_id' => $this->userId, 'season' => $this->season ])
                 ->with(['bowl'])
                 ->get();


        $correctPicks = [];

        foreach ($picks as $pick) {
            if(isset($pick->bowl->winner)){
                if($pick->team_id == $pick->bowl->winner->api_id) {
                    $correctPicks = Arr::prepend($correctPicks, $pick->confidence ?? 0);
                    $this->pointTotal = $this->pointTotal + $pick->confidence;
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
                if(isset($pick->bowl->winner)){
                    if($pick->team_id == $pick->bowl->winner->api_id) {
                        $this->pointTotal = $this->pointTotal + $highScore;
                    }
                }
               
            }
    }

    public function render()
    {
        return view('livewire.pick.user-pick', [
            'picks' => Pick::where(['user_id' => $this->userId, 'season' => $this->season])
                        ->orderBy('confidence', 'desc')
                        ->with(['team', 'bowl', 'bowl.visitor', 'bowl.home'])          
                        ->get()
        ]);
    }
}
