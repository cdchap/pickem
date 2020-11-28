<?php

namespace App\Http\Livewire;

use App\Models\Pick;
use App\Models\User;
use Livewire\Component;

class AccordianPicksTable extends Component
{   
    public $pointTotal;
    public $user;

    public function mount($userId)
    {
        $this->user = User::findOrFail($userId);

        $picks = Pick::where(['user_id' => $userId, 'season_id' => 1])
                            ->with(['bowl'])
                            ->get();

        foreach ($picks as $pick) {
            if (isset($pick->bowl->winner)) {
                if ($pick->team_id == $pick->bowl->winner->id) {
                    $this->pointTotal = $this->pointTotal + $pick->confidence;
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.accordian-picks-table', [
            'picks' => Pick::where(['user_id'=> $this->user->id, 'season_id' => 1])
                        ->orderBy('confidence', 'desc')
                        ->with(['team', 'bowl'])          
                        ->get()
        ]);
    }
}
