<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'users' => User::all(),
            ])->layout('layouts.admin');
    }
}
