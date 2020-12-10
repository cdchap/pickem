<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{

    public $search = '';
    public $showFilters = false;
    
    public function toggleShowFilters()
    {
        $this->showFilters = !$this->showFilters;
    }

    public function render()
    {
        return view('livewire.user.user-index', [
            'users' => User::search(['name', 'username', 'email'],$this->search)
                        ->orderBy('name', 'asc')
                        ->paginate(12)
        ])->layout('layouts.admin');
    }
}
