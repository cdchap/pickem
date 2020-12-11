<?php

namespace App\Http\Livewire\Pick;

use Livewire\Component;
use App\Models\Bowl;
use App\Models\Pick;
use Illuminate\Support\Arr;

class PickForm extends Component
{
    public $picks;
    public $bowls;
    public $championship;
    public $champPick;
    public $semiFinals;
    public $user;
    public $userId;
    public $season = 2019;
    public $confidence;
    public $bowlCount;
    public $reviewedPicks = [];

    protected $listeners = ['confidenceSelected' => 'removeConfidenceFromArray'];

    public function mount()
    {
        // get all the bowls
        $this->bowls = Bowl::where([
                                ['season', 2019],
                                ['championship', false],
                            ])
                            ->with('home', 'visitor')
                            ->get();
        // get the championship game
        $this->championship = Bowl::where([
                                ['season', 2019],
                                ['championship',true],
                            ])
                            ->with('home', 'visitor')
                            ->get();
        // get the semifinals so that I can put the teams in championship game form
        $this->semiFinals = Bowl::where([
                                ['season', 2019],
                                ['semi_final', true]
                            ])
                            ->with('home', 'visitor')
                            ->get();
        // getting the season to assign the id to the picks array
        
        
        // getting the signed in user for the id
        $this->user = auth()->user();
        $this->userId = auth()->user()->id;
        // creating an array for the amount of confidence points available
        $this->confidence = range(1, $this->bowls->count());
        // setting picks prop to empty array, then pushing tihe information available right away
        $this->picks = [];
        $this->champPick = [];
        foreach ($this->bowls as $i => $bowl) {
            array_push($this->picks,[
                'bowl_id' => $bowl->id,
                'season' => $this->season,
                'user_id' => $this->userId,
                'confidence' => 0
            ]);
        }
        foreach ($this->championship as $i => $bowl) {
            array_push($this->champPick,[
                'bowl_id' => $bowl->id,
                'season' => $this->season,
                'user_id' => $this->userId,
                'confidence' => null
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
                'season' => $pick['season'],
                'bowl_id' => $pick['bowl_id'],
                'team_id' => $pick['team_id'] ?? null, 
                'confidence' => $pick['confidence']
            ]);
        }
        foreach($this->champPick as $pick) {
            Pick::create([
                'user_id' => $pick['user_id'],
                'season' => $pick['season'],
                'bowl_id' => $pick['bowl_id'],
                'team_id' => $pick['team_id'] ?? null,
                'confidence' => null
            ]);
        }

        $this->user->revokePermissionTo('can pick 2020');        
    
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
