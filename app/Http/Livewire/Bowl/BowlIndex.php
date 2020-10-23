<?php

namespace App\Http\Livewire\Bowl;

use Livewire\Component;
use App\Models\Bowl;

class BowlIndex extends Component
{
    public function render()
    {
        return view('livewire.bowl.bowl-index', [
            'bowls' => Bowl::all()
        ])->layout('layouts.admin');
    }
}
