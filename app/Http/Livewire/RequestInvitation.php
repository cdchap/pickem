<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RequestInvitation extends Component
{
    public function render()
    {
        return view('livewire.request-invitation')->layout('layouts.auth');
    }
}
