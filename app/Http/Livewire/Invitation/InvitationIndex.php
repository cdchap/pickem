<?php

namespace App\Http\Livewire\Invitation;

use Livewire\Component;
use App\Models\Invitation;

class InvitationIndex extends Component
{
    public function render()
    {
        return view('livewire.invitation.invitation-index', [
            'invitations' => Invitation::where('registered_at', null)->get()
        ])->layout('layouts.admin');
    }
}
