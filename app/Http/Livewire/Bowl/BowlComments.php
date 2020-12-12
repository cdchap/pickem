<?php

namespace App\Http\Livewire\Bowl;

use App\Models\Bowl;
use App\Models\Comment;
use Livewire\Component;

class BowlComments extends Component
{
    public Bowl $bowl;
    public $comment;
    public $userId;

    protected $rules = [
        'comment' => 'required'
    ];

    public function mount()
    {
        $this->userId = auth()->user()->id;
    }

    public function updateComments()
    {
        $this->comments = Comment::where('bowl_id', $this->bowl->id)
                        ->with('users')
                        ->get();
    }

    public function save()
    {
        $this->validate();

        Comment::create([
            'bowl_id' => $this->bowl->id,
            'user_id' => $this->userId,
            'body' => $this->comment,
        ]);

        $this->updateComments();
    }

    public function render()
    {
        return view('livewire.bowl.bowl-comments',[
            'comments' => Comment::where('bowl_id', $this->bowl->id)
                        ->with('user')
                        ->get(),
        ]);
    }
}