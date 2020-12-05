<?php

namespace App\Http\Livewire\Bowl;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bowl;

class BowlIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $season = '';

    public function render()
    {
        return view('livewire.bowl.bowl-index', [
            'bowls' => Bowl::search(['home.name', 'visitor.name'],$this->search)
                        ->where('season', $this->season)
                        ->paginate(10)
                ])->layout('layouts.admin');
    }
}
