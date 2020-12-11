<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Bowl;
use Illuminate\Support\Facades\Http;

class BowlProfile extends Component
{   
    public Bowl $bowl;
    public $gameStats;
    public $homeRecord;
    public $visitorRecord;


    public function mount()
    {
        $this->visitorRecord = Http::get('https://api.collegefootballdata.com/records?year='. $this->bowl->season .'&team=' . $this->bowl->visitor->name)->json();
        $this->homeRecord = Http::get('https://api.collegefootballdata.com/records?year='. $this->bowl->season .'&team=' . $this->bowl->home->name)->json();

        $this->gameStats = Http::get('https://api.collegefootballdata.com/games/teams?year=' . $this->bowl->season .'&gameId=' . $this->bowl->api_id)->json();
        dump($this->visitorRecord);
    }

    public function render()
    {
        return view('livewire.bowl-profile');
    }
}
