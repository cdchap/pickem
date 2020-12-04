<?php

namespace App\Http\Livewire\Invitation;

use Livewire\Component;
use App\Models\Invitation;
use Livewire\WithPagination;

class InvitationIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.invitation.invitation-index', [
            'invitations' => Invitation::search('email', $this->search)->where('registered_at', null)->paginate(10)
        ])->layout('layouts.admin');
    }
}
