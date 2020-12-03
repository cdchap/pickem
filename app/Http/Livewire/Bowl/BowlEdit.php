<?php

namespace App\Http\Livewire\Bowl;

use Livewire\Component;

class BowlEdit extends Component
{
    public function render()
    {
        return view('livewire.bowl.bowl-edit')->layout('layouts.admin');
    }
}
