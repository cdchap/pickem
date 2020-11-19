<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Invitation;

class RequestInvitation extends Component
{

    public $email;
    public $message;

    protected $rules = [
        'email' => 'required|email|unique:invitations'
    ];

    public function createInvitation() {

        $this->validate();

        $invitation = new Invitation();
        $invitation->generateInvitationToken();
        $invitation->email = $this->email;
        $invitation->save();

        $this->dispatchBrowserEvent('invitation-request-sent');

        $this->message = 'Excellent! Keep an eye out for an email the next couple of days. It will contain a link to register.';
        
    }

    public function render()
    {
        return view('livewire.request-invitation')->layout('layouts.auth');
    }
}
