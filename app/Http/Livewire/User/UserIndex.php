<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{

    public $search = '';
    
    public function render()
    {
        return view('livewire.user.user-index', [
            'users' => User::search(['name', 'username', 'email'],$this->search)
                        ->paginate(12)
        ])->layout('layouts.admin');
    }
}
