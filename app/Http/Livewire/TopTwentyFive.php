<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class TopTwentyFive extends Component
{
    public $topTwentyFive;

    public function mount()
    {
        $this->topTwentyFive = Http::get('http://site.api.espn.com/apis/site/v2/sports/football/college-football/rankings')['rankings'];
    }

    public function loadTopTwentyFive()
    {
        
    }

    public function render()
    {
        return view('livewire.top-twenty-five');
    }

    
}
