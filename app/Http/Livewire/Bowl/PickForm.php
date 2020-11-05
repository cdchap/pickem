<?php

namespace App\Http\Livewire\Bowl;

use Livewire\Component;
use App\Models\Bowl;

class PickForm extends Component
{
    // array to hold form data
    public $picks = [];
    public $pick='';
    // pass bowls and teams to view ** that is in the render method **
    // save function to save picks to database
    // some way to store the order of the picks to create the confidence amount
    // change role to admin?

    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.bowl.pick-form', [
            'bowls' => Bowl::where('season_id', 1)->with('home', 'visitor')->get()
        ]);
    }
}
