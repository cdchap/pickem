<?php

namespace App\Http\Livewire\Bowl;

use Livewire\Component;
use App\Models\Team;

class BowlCreate extends Component
{
    public $teams = [];
    public $name;
    public $season;
    public $channel;
    public $kickoff;
    public $date;
    public $homeId;
    public $visitorId;
    public $semiFinal;

    protected $rules = [
        'name' => 'string',
        'season' => 'integer',
        'channel' => 'string',
        'kickoff' => 'date_format:H:i',
        'date' => 'date_format:Y-m-d',
        'home_id' => 'integer',
        'visitor_id' => 'integer'
    ];

    public function mount()
    {
        

    }

    public function loadTeams()
    {
        $this->teams = Team::all();
    }

    public function render()
    {
        return view('livewire.bowl.bowl-create');
    }
}
