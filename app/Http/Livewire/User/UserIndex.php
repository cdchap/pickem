<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Query\Builder;

class UserIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $showFilters = false;
    public $hasPicked2020;
    public $filters = [
        'hasPicked' => '',
        'permissions' => '',
    ];

    public function toggleShowFilters()
    {
        $this->showFilters = !$this->showFilters;
    }

    public function render()
    {
        return view('livewire.user.user-index', [
            'users' => User::search(['name', 'username', 'email'],$this->search)
                        ->when($this->filters['permissions'], function($query){
                            $query->whereHas('permissions', function($query){
                                $query->where('name', 'LIKE', "%{$this->filters['permissions']}%");
                            });
                        })
                        ->orderBy('name', 'asc')
                        ->paginate(12)
        ])->layout('layouts.admin');
    }
}


// where('column', 'OPERATOR', "%{$searchTerm}%")