<?php

namespace App\Http\Livewire\Pick;

use Livewire\Component;
use App\Models\Bowl;
use App\Models\Pick;
use App\Models\Season;
use Illuminate\Support\Arr;

class PickForm extends Component
{
    public $picks;
    public $bowls;
    public $championship;
    public $semiFinals;
    public $user;
    public $userId;
    public $seasonId;
    public $confidence;
    public $bowlCount;
    public $teamCount;
    public $season;
    public $reviewedPicks =[];

    protected $listeners = ['confidenceSelected' => 'removeConfidenceFromArray'];

    public function mount()
    {
        $this->bowls = Bowl::where([
                                ['season', 2019],
                                ['championship', false],
                            ])
                            ->with('home', 'visitor')
                            ->get();
        $this->championship = Bowl::where([
                                ['season', 2019],
                                ['championship',true],
                            ])
                            ->with('home', 'visitor')
                            ->get();
                            
        $this->semiFinals = Bowl::where([
                                ['season', 2019],
                                ['semi_final', true]
                            ])
                            ->with('home', 'visitor')
                            ->get();
        $this->season = Season::where('season', 2019)->firstOrFail();
        $this->seasonID = $this->season->id;
        $this->user = auth()->user();
        $this->userId = auth()->user()->id;
        $this->confidence = range(1, $this->bowls->count());
        $this->picks = [];
        foreach ($this->bowls as $i => $bowl) {
            array_push($this->picks,[
                'bowl_id' => $bowl->id,
                'season_id' => $this->season->id,
                'user_id' => $this->userId,
                'confidence' => 0
            ]);
        }
        
        $this->bowlCount = $this->bowls->count();

        
    }

    public function removeConfidenceFromArray($confidenceNumber)
    {
       $key = array_search($confidenceNumber, $this->confidence);

       unset($this->confidence[$key]);
            
        $this->bowlCount--;
    }

    public function addConfidenceToArray($confidenceNumber, $index)
    {
        if(!in_array($confidenceNumber, $this->confidence) || empty($this->confidence)) {
            $this->confidence = Arr::prepend($this->confidence, $confidenceNumber);
        }

        $this->picks[$index]['confidence'] = 0;
        $this->bowlCount++;

        sort($this->confidence);

    }

    public function submit()
    {
        foreach($this->picks as $pick) {
            Pick::create([
                'user_id' => $pick['user_id'],
                'season_id' => $pick['season_id'],
                'bowl_id' => $pick['bowl_id'],
                'team_id' => $pick['team_id'] ?? null, 
                'confidence' => $pick['confidence']
            ]);
        }

        $this->user->removeRole('basic');
        $this->user->assignRole('user');        
    
        return redirect()->route('home');
    }

    public function reviewedPicks() {
      

        $unsortedPicks = [];

        foreach ($this->picks as $key => $pick) {
            if(!Arr::has($pick, 'team_id')) {
                $pick['team_id'] = null;
            }

            $unsortedPicks = Arr::prepend($unsortedPicks, $pick);

        }

        $this->reviewedPicks = array_values(Arr::sort($unsortedPicks, function($value){
            return $value['confidence'];
        }));
    }

    public function render()
    {
        return view('livewire.pick.pick-form');
    }
}
