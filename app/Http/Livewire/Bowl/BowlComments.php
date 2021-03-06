<?php

namespace App\Http\Livewire\Bowl;

use App\Models\Bowl;
use App\Models\User;
use App\Models\Comment;
use Livewire\Component;

class BowlComments extends Component
{
    public Bowl $bowl;
    public User $user;
    public $comment;
    public $userId;

    protected $rules = [
        'comment' => 'required'
    ];

    public function save()
    {
        $this->validate();

        $newComment = Comment::create([
            'bowl_id' => $this->bowl->id,
            'user_id' => $this->user->id,
            'body' => $this->comment,
        ]);


        $this->comment = '';
    }

    public function render()
    {
        return view('livewire.bowl.bowl-comments',[
            'comments' => Comment::where('bowl_id', $this->bowl->id)
                                ->with('user')
                                ->get()
        ]);
    }
}