<?php

namespace App\Http\Livewire\Bowl;

use Livewire\Component;
use App\Models\Bowl;

class BowlList extends Component
{

    public function render()
    {
        return view('livewire.bowl.bowl-list', 
        ['bowls' => Bowl::where('season_id', 1)
                    ->orderBy('date') 
                    ->get()]);
    }
}
