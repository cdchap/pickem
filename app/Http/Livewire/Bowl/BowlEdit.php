<?php

namespace App\Http\Livewire\Bowl;

use App\Models\Bowl;
use Livewire\Component;

class BowlEdit extends Component
{
    public Bowl $bowl;

    protected $rules = [
        'bowl.name' => '',
        'bowl.home_score' => 'integer',
        'bowl.visitor_score' => 'integer',
        'bowl.winner_id' => 'integer',
        'bowl.semi_final' => '',
        'bowl.championship' => ''

    ];

    public function save()
    {
        $this->validate();
        $this->bowl->save();

        $this->dispatchBrowserEvent('notify', 'The bowl has been saved');
    }

    public function render()
    {
        return view('livewire.bowl.bowl-edit')->layout('layouts.admin');
    }
}
