<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{


    public function render()
    {
        return view('livewire.user.user-index', [
            'users' => User::all()
        ])->layout('layouts.admin');
    }
}
