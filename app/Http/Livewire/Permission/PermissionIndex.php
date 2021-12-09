<?php

namespace App\Http\Livewire\Permission;

use Spatie\Permission\Models\Permission;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;

class PermissionIndex extends Component
{
    public function render()
    {
        return view('livewire.permission.permission-index', [
            'permissions' => Permission::all()
        ])->layout('layouts.admin');
    }
}
