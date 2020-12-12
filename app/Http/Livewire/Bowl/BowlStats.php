<?php

namespace App\Http\Livewire\Bowl;

use App\Models\Bowl;
use App\Models\Pick;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class BowlStats extends Component
{
    public Bowl $bowl;
    public $bowlStats;
    public $homeStats;
    public $visitorStats;
    public $homePickPercentage = 0;
    public $visitorPickPercentage = 0;
    public $picks;
    public $categories = [
        'tacklesForLoss', 
        'tackles',
        'sacks',
        'qbHurries',
        'fumblesRecovered',
        'rushingTDs',
        'passingTDs',
        'possessionTime',
        'interceptions',
        'fumblesLost',
        'turnovers',
        'totalPenaltiesYards',
        'yardsPerRushAttempt',
        'rushingAttempts',
        'rushingYards',
        'yardsPerPass',
        'completionAttempts',
        'netPassingYards',
        'totalYards',
        'thirdDownEff',
        'firstDowns'
    ];

    public function mount()
    {
        $this->picks = Pick::where('bowl_id', $this->bowl->id)->get();
        $this->findPickAvg($this->picks, $this->bowl);
        $this->bowlStats = Http::get('https://api.collegefootballdata.com/games/teams?year=' . $this->bowl->season .'&gameId=' . $this->bowl->api_id)->json();
        $homeStats = collect($this->bowlStats['0']['teams']['1']['stats']);
        $visitorStats = collect($this->bowlStats['0']['teams']['0']['stats']);

        $this->visitorStats = $visitorStats->whereIn('category', $this->categories)->values();
        $this->homeStats = $homeStats->whereIn('category', $this->categories)->values();
        
        
    }

    public function findPickAvg($picks, $bowl)
    {
         $count = $this->picks->count();
         $visitorCount = $this->picks->where('team_id', $bowl->visitor->api_id)->count();
         $homeCount = $this->picks->where('team_id', $bowl->home->api_id)->count();
         $this->visitorPickPercentage = $visitorCount/$count * 100;
         $this->homePickPercentage = $homeCount/$count * 100;
    }

    public function render()
    {
        return view('livewire.bowl.bowl-stats');
    }
}
