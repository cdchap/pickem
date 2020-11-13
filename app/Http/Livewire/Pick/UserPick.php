<?php

namespace App\Http\Livewire\Pick;

use Livewire\Component;
use App\Models\Pick;
use App\Models\User;

class UserPick extends Component
{
    public $userName;
    public $userId;

    public function mount(User $user)
    {
        $this->userName = $user->username;
        $this->userId = $user->id;
    }

    public function render()
    {
        return view('livewire.pick.user-pick', [
            'picks' => Pick::where(['user_id' => $this->userId, 'season_id' => 1])
                        ->orderBy('confidence', 'desc')
                        ->with(['team', 'bowl'])          
                        ->get()
        ]);
    }
}
