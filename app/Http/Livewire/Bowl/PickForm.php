<?php

namespace App\Http\Livewire\Bowl;

use Livewire\Component;
use App\Models\Bowl;
use Illuminate\Support\Arr;

class PickForm extends Component
{
    // array to hold form data
    public $picks;
    public $bowls;
    public $userId;
    public $seasonId = 1;
    public $confidence;
    // load the bowls in mount, push each bowl to an array $picks, push user id and season id to array $picks
    // from the forms on the page, push the team id to array $picks
    // save function to save picks to database
    // some way to store the order of the picks to create the confidence amount
    // change role from basic to user.

    protected $listeners = ['confidenceSelected' => 'removeConfidenceFromArray'];

    public function mount()
    {
        $this->bowls = Bowl::where('season_id', 1)->with('home', 'visitor')->get();
        $this->userId = auth()->user()->id;
        $this->confidence = range(1, $this->bowls->count());
        $this->picks = collect([]);
        foreach ($this->bowls as $i => $bowl) {
            $this->picks->push(['bowl_id' => $bowl->id,
                'season_id' => $this->seasonId,
                'user_id' => $this->userId,
                'confidence' => 0
            ]);
        }
    }

    public function removeConfidenceFromArray($confidenceNumber)
    {
        unset($this->confidence[$confidenceNumber - 1]);
        
    }

    public function addConfidenceToArray($confidenceNumber)
    {
        
        if(!in_array($confidenceNumber, $this->confidence)) {
            $this->confidence = Arr::prepend($this->confidence, $confidenceNumber);
        }

        sort($this->confidence);

    }

    public function render()
    {
        return view('livewire.bowl.pick-form');
    }
}
