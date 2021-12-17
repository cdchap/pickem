<?php

namespace App\Http\Livewire\Bowl;

use App\Models\Bowl;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class BowlEdit extends Component
{
    public Bowl $bowl;
    public $semiFinal;
    public $championship;

    protected $rules = [
        'bowl.name' => '',
        'bowl.home_score' => 'integer',
        'bowl.visitor_score' => 'integer',
        'bowl.winner_id' => 'integer',
    ];

    public function mount()
    {
        $this->semiFinal = $this->bowl->semi_final;
        $this->championship = $this->bowl->championship;
    }

    public function updateBowl()
    {
        $apiBowl = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('app.cfbd_token') 
        ])
        ->get('https://api.collegefootballdata.com/games?year='. $this->bowl->season .'&seasonType=postseason&id=' . $this->bowl->api_id)->json();

        $spread = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('app.cfbd_token')
        ])->get('https://api.collegefootballdata.com/lines?gameId=' . $this->bowl->api_id . '&year='. $this->bowl->season .'&seasonType=postseason')->json();

        if(empty($apiBowl['0']['home_points'])) {
            $this->bowl->name = $apiBowl[0]['notes']; 
            $this->bowl->spread = $spread[0]['lines'][0]['formattedSpread'];
            $this->bowl->save();
            $this->dispatchBrowserEvent('notify', 'Score not currently avaialble. Check back after the game has been played.');
        } else {
            $this->bowl->name = $apiBowl[0]['notes'];
            $this->bowl->spread = $spread[0]['lines'][0]['formattedSpread'];
            $this->bowl->home_score = $apiBowl['0']['home_points'];
            $this->bowl->visitor_score = $apiBowl['0']['away_points'];
            $this->bowl->home_quarter_one_score = $apiBowl['0']['home_line_scores']['0'] ?? 0;
            $this->bowl->home_quarter_two_score = $apiBowl['0']['home_line_scores']['1'] ?? 0;
            $this->bowl->home_quarter_three_score = $apiBowl['0']['home_line_scores']['2'] ?? 0;
            $this->bowl->home_quarter_four_score = $apiBowl['0']['home_line_scores']['3'] ?? 0;
            $this->bowl->visitor_quarter_one_score = $apiBowl['0']['away_line_scores']['0'] ?? 0;
            $this->bowl->visitor_quarter_two_score = $apiBowl['0']['away_line_scores']['1'] ?? 0;
            $this->bowl->visitor_quarter_three_score = $apiBowl['0']['away_line_scores']['2'] ?? 0;
            $this->bowl->visitor_quarter_four_score = $apiBowl['0']['away_line_scores']['3'] ?? 0;
            $this->bowl->save();

        }
        

    }

    public function save()
    {
        $this->validate();

        $this->bowl->semi_final = $this->semiFinal;
        $this->bowl->championship = $this->championship;
        $this->bowl->save();

        $this->dispatchBrowserEvent('notify', 'The bowl has been saved');
    }

    public function render()
    {
        return view('livewire.bowl.bowl-edit')->layout('layouts.admin');
    }
}
