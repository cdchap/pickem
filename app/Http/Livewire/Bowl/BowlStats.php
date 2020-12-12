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
    public $homePickPercentage = 0;
    public $visitorPickPercentage = 0;
    public $picks;

    public function mount()
    {
        $this->picks = Pick::where('bowl_id', $this->bowl->id)->get();
        $this->findPickAvg($this->picks, $this->bowl);
        
    }

    public function findPickAvg($picks, $bowl)
    {
         $count = $this->picks->count();
         $visitorCount = $this->picks->where('team_id', $bowl->visitor->api_id)->count();
         $homeCount = $this->picks->where('team_id', $bowl->home->api_id)->count();
         $this->visitorPickPercentage = $visitorCount/$count * 100;
         $this->homePickPercentage = $homeCount/$count * 100;
    }

    public function loadBowlStats()
    {
        $this->bowlStats = Http::get('https://api.collegefootballdata.com/games/teams?year=' . $this->bowl->season .'&gameId=' . $this->bowl->api_id)->json();
    }

    public function render()
    {
        return view('livewire.bowl.bowl-stats');
    }
}
