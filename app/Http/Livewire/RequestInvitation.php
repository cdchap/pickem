<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Invitation;

class RequestInvitation extends Component
{

    public $email;

    protected $rules = [
        'email' => 'required|email|unique:invitations'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createInvitation() {
        $invitation = Invitation::create(['email' => $this->email ]);
        $invitation->generateInvitationToken();
        
    }

    public function render()
    {
        return view('livewire.request-invitation')->layout('layouts.auth');
    }
}
