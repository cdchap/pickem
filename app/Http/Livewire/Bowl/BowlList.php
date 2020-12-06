<?php

namespace App\Http\Livewire\Bowl;

use Livewire\Component;
use App\Models\Bowl;
use App\Models\Pick;
use App\Models\User;
use Illuminate\Support\Arr;

class BowlList extends Component
{
    public $userId;
    public $username;
    public $season = 2019;

    public function mount()
    {
        $picks = [];
        if (auth()->user()) {
            $user = auth()->user();
            $this->userId = $user->id;
            $this->username = $user->username;
        } else {
            $this->username = '';
            
        }

    }

    public function render()
    {
        return view('livewire.bowl.bowl-list', [
            'bowls' => Bowl::where('season', $this->season)
                        ->orderBy('start_date')
                        ->with(['home', 'visitor', 'winner', 'picks'])
                        ->get(),
            'picks' => Pick::where('user_id', $this->userId)
                        ->with('team')
                        ->get()
        ]);
    }
}
