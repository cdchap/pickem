<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Invitation;

class RequestInvitation extends Component
{

    public $email;
    public $successMessage;

    protected $rules = [
        'email' => 'required|email|unique:invitations'
    ];

    public function createInvitation() {

        $this->validate();

        $invitation = new Invitation();
        $invitation->generateInvitationToken();
        $invitation->email = $this->email;
        $invitation->save();

        $this->dispatchBrowserEvent('invitation-request-sent', ['message' => 'Excellent! We will be sending you an email in the next couple of days with a link to register', 'email' => $this->email]);

        
    }

    public function render()
    {
        return view('livewire.request-invitation')->layout('layouts.auth');
    }
}
