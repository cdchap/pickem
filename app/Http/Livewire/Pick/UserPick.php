<?php

namespace App\Http\Livewire\Pick;

use Livewire\Component;
use App\Models\Pick;
use App\Models\User;

class UserPick extends Component
{
    public $userName;
    public $userId;
    public $pointTotal = 0;

    public function mount(User $user)
    {
        $this->userName = $user->username;
        $this->userId = $user->id;
        $picks = Pick::where(['user_id' => $this->userId, 'season_id' => 1 ])
                 ->with(['bowl'])
                 ->get();
        foreach ($picks as $pick) {
            if(isset($pick->bowl->winner)){
                if($pick->team_id == $pick->bowl->winner->api_id) {
                    $this->pointTotal = $this->pointTotal + $pick->confidence;
                }
            }   
        }
    }

    public function render()
    {
        return view('livewire.pick.user-pick', [
            'picks' => Pick::where(['user_id' => $this->userId, 'season_id' => 1])
                        ->orderBy('confidence', 'desc')
                        ->with(['team', 'bowl', 'bowl.visitor', 'bowl.home'])          
                        ->get()
        ]);
    }
}
