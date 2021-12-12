<?php

namespace App\Http\Livewire\Bowl;

use App\Models\Bowl;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;

class BowlIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $season = 2021;

    public function render()
    {
        return view('livewire.bowl.bowl-index', [
            'bowls' => Bowl::search(['home.name', 'visitor.name'],$this->search)
                        ->where('season', $this->season)
                        ->paginate(10)
                ])->layout('layouts.admin');
    }
}
