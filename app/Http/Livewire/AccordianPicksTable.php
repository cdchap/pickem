<?php

namespace App\Http\Livewire;

use App\Models\Pick;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Arr;

class AccordianPicksTable extends Component
{   
    public $pointTotal;
    public User $user;
    public $season = 2019;

    public function mount()
    {
       
        // $correctPicks = [];

        // $picks = Pick::where(['user_id' => $this->user->id, 'season' => 2019])
        //                     ->with(['bowl'])
        //                     ->get();

        // foreach ($picks as $pick) {
        //     if (isset($pick->bowl->winner)) {
        //         if ($pick->team_id == $pick->bowl->winner->api_id) {
        //             $correctPicks = Arr::prepend($correctPicks, $pick->confidence ?? 0); 
        //             $this->pointTotal = $this->pointTotal + $pick->confidence;
        //         }
        //     }
        // }

        // $correctPicks = array_filter($correctPicks, function($value) {
        //         return $value > 0;
        //     });
        // $correctPicks = array_reverse(Arr::sort($correctPicks)); 

        // $championshipPick = $picks->where('bowl.championship', true);
        // $highScore = reset($correctPicks);

        
        // foreach($championshipPick as $pick) {
        //     if(isset($pick->bowl->winner) && $pick->team_id == $pick->bowl->winner->api_id) {
        //         $this->pointTotal = $this->pointTotal + $highScore;
        //     }
            
        // }
    }

    public function render()
    {
        return view('livewire.accordian-picks-table', [
            'picks' => Pick::where(['user_id'=> $this->user->id, 'season' => $this->season])
                        ->orderBy('confidence', 'desc')
                        ->with(['team', 'bowl'])          
                        ->get()
        ]);
    }
}
