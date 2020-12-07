<?php

namespace App\Http\Livewire\Bowl;

use App\Models\Bowl;
use Livewire\Component;

class BowlEdit extends Component
{
    public Bowl $bowl;
    public $saved = false;

    protected $rules = [
        'bowl.name' => '',
        'bowl.home_score' => '',
        'bowl.visitor_score' => '',
        'bowl.winner_id' => '',
        'bowl.semi_final' => '',
        'bowl.championship' => ''

    ];

    public function save()
    {
        $this->validate();
        $this->bowl->save();
        $this->saved = true;
    }

    public function hideNotification() 
    {
        $this->saved = false;
    }

    public function render()
    {
        return view('livewire.bowl.bowl-edit')->layout('layouts.admin');
    }
}
