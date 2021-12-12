<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
// use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionCreate extends Component
{
    public $name;
    public $roles;
    public $role;
    protected $rules = [
        'name' => 'required'
    ];

    public function mount()
    {
        $this->roles = Role::all();
        $this->role = Role::findByName('user');
    }

    public function resetForm() 
    {
        $this->reset('name');
    }

    public function save()
    {
        $this->validate();
        // dd($this->validate());
        $permission = Permission::create(['name' => $this->name]);
        $this->role->givePermissionTo($permission);
        $this->resetForm();
        $this->dispatchBrowserEvent('notify', 'Permission has been created');
    }

    public function render()
    {
        return view('livewire.permission.permission-create');
    }
}
