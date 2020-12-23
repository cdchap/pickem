<?php

namespace App\Http\Livewire\Score;

use App\Models\Pick;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TotalScore extends Component
{
    use WithPagination;

    public $season = 2020;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.score.total-score', [
           'picks' => Pick::where('season', $this->season)
                        ->with(['user', 'bowl', 'team'])
                        ->orderBy('user_id', 'asc')
                        ->get(),
            'users' => User::search(['name', 'username'], $this->search)->orderBy('username', 'asc')->paginate(10),
        ]);
    }
}
