<?php

namespace App\Http\Livewire\Bowl;

use Livewire\Component;
use App\Models\Bowl;
use Illuminate\Support\Arr;

use function PHPUnit\Framework\isEmpty;

class PickForm extends Component
{
    // array to hold form data
    public $picks;
    public $bowls;
    public $userId;
    public $seasonId = 1;
    public $confidence;
    public $bowlCount;
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
        $this->picks = [];
        foreach ($this->bowls as $i => $bowl) {
            array_push($this->picks,['bowl_id' => $bowl->id,
                'season_id' => $this->seasonId,
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

    public function reviewPicks()
    {

    }

    public function submit()
    {

    }

    public function render()
    {
        return view('livewire.bowl.pick-form');
    }
}
