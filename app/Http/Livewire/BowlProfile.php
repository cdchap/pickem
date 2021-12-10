<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Bowl;
use Illuminate\Support\Facades\Http;

class BowlProfile extends Component
{   
    public Bowl $bowl;
    public $homeRecord;
    public $visitorRecord;
    public $game;


    public function mount()
    {
        $this->visitorRecord = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('app.cfbd_token')
        ])
        ->get('https://api.collegefootballdata.com/records?year='. $this->bowl->season .'&team=' . $this->bowl->visitor->name)->json();
        $this->homeRecord = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('app.cfbd_token')
        ])
        ->get('https://api.collegefootballdata.com/records?year='. $this->bowl->season .'&team=' . $this->bowl->home->name)->json();
        $this->game = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('app.cfbd_token')
        ])
        ->get('https://api.collegefootballdata.com/games?year='. $this->bowl->season . '&seasonType=postseason&id='. $this->bowl->api_id)->json();
    }

    public function render()
    {
        return view('livewire.bowl-profile');
    }
}
