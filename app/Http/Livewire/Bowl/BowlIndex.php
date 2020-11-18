<?php

namespace App\Http\Livewire\Bowl;

use Livewire\Component;
use App\Models\Bowl;

class BowlIndex extends Component
{
    public function render()
    {
        return view('livewire.bowl.bowl-index', [
            'bowls' => Bowl::where('season_id', 1)
                        ->with(['season', 'home', 'visitor'])
                        ->orderBy('date')
                        ->get()
                ])->layout('layouts.admin');
    }
}
