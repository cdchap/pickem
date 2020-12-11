<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Bowl;

class BowlProfile extends Component
{   
    public Bowl $bowl;

    public function render()
    {
        return view('livewire.bowl-profile');
    }
}
