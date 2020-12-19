<?php

namespace App\Http\Livewire\Bowl;

use App\Models\Bowl;
use Livewire\Component;

class BowlEdit extends Component
{
    public Bowl $bowl;
    public $semiFinal;
    public $championship;

    protected $rules = [
        'bowl.name' => '',
        'bowl.home_score' => 'integer',
        'bowl.visitor_score' => 'integer',
        'bowl.winner_id' => 'integer',

    ];

    public function mount()
    {
        $this->semiFinal = $this->bowl->semi_final;
        $this->championship = $this->bowl->championship;
    }

    public function save()
    {
        $this->validate();

        $this->bowl->semi_final = $this->semiFinal;
        $this->bowl->championship = $this->championship;
        $this->bowl->save();

        $this->dispatchBrowserEvent('notify', 'The bowl has been saved');
    }

    public function render()
    {
        return view('livewire.bowl.bowl-edit')->layout('layouts.admin');
    }
}
