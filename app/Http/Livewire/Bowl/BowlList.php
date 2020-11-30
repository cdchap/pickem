<?php

namespace App\Http\Livewire\Bowl;

use Livewire\Component;
use App\Models\Bowl;
use App\Models\Pick;
use App\Models\User;
use Illuminate\Support\Arr;

class BowlList extends Component
{
    public $picks;
    public $userId;
    public $username;
    public $season = 2019;

    public function mount()
    {
        if (auth()->user()) {
            $user = auth()->user();
            $this->userId = $user->id;
            $this->username = $user->username;
            $this->picks = Pick::where('user_id', $this->userId)->select('user_id', 'bowl_id', 'team_id', 'confidence')->with('team')->get();
        } else {
            $this->username = '';
            $this->picks= [];
        }
        
        

    }

    public function render()
    {
        return view('livewire.bowl.bowl-list', 
        ['bowls' => Bowl::where('season', $this->season)
                    ->orderBy('start_date')
                    ->with(['home', 'visitor', 'winner', 'picks'])
                    ->get()
        ]);
    }
}
