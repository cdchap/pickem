<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;

class PermissionCreate extends Component
{
    public function render()
    {
        return view('livewire.permission.permission-create')->layout('layouts.admin');
    }
}
