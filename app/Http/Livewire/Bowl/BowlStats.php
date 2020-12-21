<?php

namespace App\Http\Livewire\Bowl;

use App\Models\Bowl;
use App\Models\Pick;
use App\Models\User;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class BowlStats extends Component
{
    public Bowl $bowl;
    public User $user;
    public $userId;
    public $bowlStats;
    public $homeStats;
    public $visitorStats;
    public $homePickPercentage = 0;
    public $visitorPickPercentage = 0;
    public $picks;
    public $comment;

    protected $rules = [
        'comment' => 'required'
    ];

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

        if(isset($this->bowlStats)) {
            $homeStats = collect($this->bowlStats['0']['teams']['1']['stats'] ?? 0);
            $visitorStats = collect($this->bowlStats['0']['teams']['0']['stats'] ?? 0);
    
            $this->visitorStats = $visitorStats->whereIn('category', $this->categories)->values();
            $this->homeStats = $homeStats->whereIn('category', $this->categories)->values();
        }

        $this->userId = auth()->user()->id;
        
    }

    public function findPickAvg($picks, $bowl)
    {
         $count = $this->picks->count();
         $visitorCount = $this->picks->where('team_id', $bowl->visitor->api_id)->count();
         $homeCount = $this->picks->where('team_id', $bowl->home->api_id)->count();

         if($count > 0) {
             $this->visitorPickPercentage = $visitorCount/$count * 100;
             $this->homePickPercentage = $homeCount/$count * 100;
         } else {
            $this->visitorPickPercentage = 0; 
            $this->homePickPercentage = 0;
         }
    }

    public function save()
    {
        $this->validate();

        Comment::create([
            'bowl_id' => $this->bowl->id,
            'user_id' => $this->userId,
            'body' => $this->comment,
        ]);

    }

    public function render()
    {
        return view('livewire.bowl.bowl-stats', [
            'comments' => Comment::where('bowl_id', $this->bowl->id)
                        ->with('user')
                        ->get()
        ]);
    }
}
