<?php

namespace App\Http\Livewire\Bowl;

use Livewire\Component;
use App\Models\Team;

class BowlCreate extends Component
{
    public $teams;
    public $name;
    public $seasonId;
    public $channel;
    public $kickoff;
    public $date;
    public $homeId;
    public $visitorId;
    public $semiFinal;

    protected $rules = [
        'name' => 'required|string',
        'seasonId' => 'required|integer|between:1,129',
        'channel' => 'required|string',
        'kickoff' => 'required|date_format:H:i',
        'date' => 'required|date_format:Y-m-d',
        'home_id' => 'required|integer',
        'visitor_id' => 'required|integer'
    ];

    public function mount()
    {
        $this->teams = Team::all();
        $this->seasonId = 1;

    }

    public function render()
    {
        return view('livewire.bowl.bowl-create');
    }
}
