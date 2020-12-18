<?php

namespace App\Http\Livewire\Admin;

use App\Models\Invitation;
use Livewire\Component;
use App\Models\User;

class Dashboard extends Component
{
    public $invitationsCount;

    public function mount()
    {
        $invitaions = Invitation::where('registered_at', null)->get();

        $this->invitationsCount = $invitaions->count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard', [
            'users' => User::all(),
            ])->layout('layouts.admin');
    }
}
