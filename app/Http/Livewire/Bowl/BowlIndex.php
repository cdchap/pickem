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

        $currentBowls = Bowl::where('season', $this->season)->get();
        $apiBowls = Http::get('https://api.collegefootballdata.com/games?year=' . $this->season . '&seasonType=postseason')->json();
        
        foreach ($currentBowls as $key => $bowl) {
            foreach($apiBowls as $key => $apiBowl) {
                if($bowl->api_id == $apiBowl['id']) {
                    $bowl->home_score = $apiBowl['home_points'];
                    $bowl->visitor_score = $apiBowl['away_points'];
                    $bowl->home_quarter_one_score = $apiBowl['home_line_scores']['0'] ?? 0;
                    $bowl->home_quarter_two_score = $apiBowl['home_line_scores']['1'] ?? 0;
                    $bowl->home_quarter_three_score = $apiBowl['home_line_scores']['2'] ?? 0;
                    $bowl->home_quarter_four_score = $apiBowl['home_line_scores']['3'] ?? 0;
                    $bowl->visitor_quarter_one_score = $apiBowl['away_line_scores']['0'] ?? 0;
                    $bowl->visitor_quarter_two_score = $apiBowl['away_line_scores']['1'] ?? 0;
                    $bowl->visitor_quarter_three_score = $apiBowl['away_line_scores']['2'] ?? 0;
                    $bowl->visitor_quarter_four_score = $apiBowl['away_line_scores']['3'] ?? 0;
                    $bowl->save();
                }
            }
        }

        $this->dispatchBrowserEvent('notify', 'The scores have been updated');
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
