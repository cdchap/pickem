<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $showFilters = false;
    public $hasPicked2020;
    public $filters = [
        'hasPicked' => '',
        'permissions' => '',
        'roles' => '',
    ];

    public function toggleShowFilters()
    {
        $this->showFilters = !$this->showFilters;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilters()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->reset('filters');
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
                        ->when($this->filters['roles'], function($query) {
                            $query->whereHas('roles', function($query) {
                                $query->where('name', 'LIKE',"%{$this->filters['roles']}%");
                            });
                        })
                        ->with('permissions', 'roles')
                        ->orderBy('name', 'asc')
                        ->paginate(12),
            'permissions' => Permission::all(),
            'roles' => Role::all(),
            ])->layout('layouts.admin');
    }
}