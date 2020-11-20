<?php

namespace App\Http\Livewire\Pick;

use Livewire\Component;
use App\Models\Bowl;
use App\Models\Pick;
use Illuminate\Support\Arr;

use function PHPUnit\Framework\isEmpty;

class PickForm extends Component
{
    public $picks;
    public $bowls;
    public $user;
    public $userId;
    public $seasonId = 1;
    public $confidence;
    public $bowlCount;

    protected $listeners = ['confidenceSelected' => 'removeConfidenceFromArray'];
    protected $rules = [
        'picks.*.team_id' => 'required'
    ];

    public function mount()
    {
        $this->bowls = Bowl::where('season_id', 1)->with('home', 'visitor')->get();
        $this->user = auth()->user();
        $this->userId = auth()->user()->id;
        $this->confidence = range(1, $this->bowls->count());
        $this->picks = [];
        foreach ($this->bowls as $i => $bowl) {
            array_push($this->picks,[
                'bowl_id' => $bowl->id,
                'season_id' => $this->seasonId,
                'user_id' => $this->userId,
                'confidence' => 0
            ]);
        }
        $this->bowlCount = $this->bowls->count();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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
                'team_id' => $pick['team_id'] ?? 129, 
                'confidence' => $pick['confidence']
            ]);
        }

        $this->user->removeRole('basic');
        $this->user->assignRole('user');        
    
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.pick.pick-form');
    }
}
