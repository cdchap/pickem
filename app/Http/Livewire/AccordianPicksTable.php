<?php

namespace App\Http\Livewire;

use App\Models\Pick;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Arr;

class AccordianPicksTable extends Component
{   
    public User $user;
    public $season = 2019;


    public function render()
    {
        return view('livewire.accordian-picks-table', [
            'picks' => Pick::where(['user_id'=> $this->user->id, 'season' => $this->season])
                        ->orderBy('confidence', 'desc')
                        ->with(['team', 'bowl'])          
                        ->get()
        ]);
    }
}
