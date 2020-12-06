<?php

namespace App\Http\Livewire\Bowl;

use App\Models\Bowl;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;

class BowlIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $season = '2019';

    public function updateBowls() {

        $currentBowls = Bowl::where('season', 2019)->get();
        $apiBowls = Http::get('https://api.collegefootballdata.com/games?year=2019&seasonType=postseason')->json();
        
        foreach ($currentBowls as $key => $bowl) {
            foreach($apiBowls as $key => $apiBowl) {
                if($bowl->api_id == $apiBowl['id']) {
                    // dd($apiBowl['home_points']);
                    $bowl->home_score = $apiBowl['home_points'];
                    $bowl->visitor_score = $apiBowl['away_points'];
                    $bowl->save();
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.bowl.bowl-index', [
            'bowls' => Bowl::search(['home.name', 'visitor.name'],$this->search)
                        ->where('season', $this->season)
                        ->paginate(10)
                ])->layout('layouts.admin');
    }
}
