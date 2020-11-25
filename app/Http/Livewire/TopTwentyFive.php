<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class TopTwentyFive extends Component
{
    public $cfpTopTwentyFive = [];
    public $apTopTwentyFive = [];
    

    public function mount()
    {
        
    }

    public function loadTopTwentyFive()
    {
        $topTwentyFive = collect(Http::get('http://site.api.espn.com/apis/site/v2/sports/football/college-football/rankings')['rankings']);
        $this->cfpTopTwentyFive = $topTwentyFive->firstWhere('type', 'cfp');
        $this->cfpTopTwentyFive = $this->cfpTopTwentyFive['ranks'];
        // dump($this->cfpTopTwentyFive);
        $this->apTopTwentyFive = $topTwentyFive->firstWhere('type', 'ap');
        $this->apTopTwentyFive = $this->apTopTwentyFive['ranks'];
        
    }

    public function render()
    {
        return view('livewire.top-twenty-five');
    }

    
}
