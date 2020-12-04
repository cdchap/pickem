<?php

namespace App\Http\Livewire\Bowl;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bowl;

class BowlIndex extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.bowl.bowl-index', [
            'bowls' => Bowl::where('season', 2019)
                        ->with(['season', 'home', 'visitor'])
                        ->orderBy('start_date')
                        ->paginate(10)
                ])->layout('layouts.admin');
    }
}
