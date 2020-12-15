<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatarUrl()
    {
        return 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($this->email))) . '?d=retro';
    }

    public function picks()
    {
        return $this->hasMany('App\Models\Pick', 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getConfidencePoints($picks)
    {
        $score = 0;
        $correctPicks = [];

        foreach ($picks as $key => $pick) {
            if(isset($pick->bowl->winner) && $pick->user_id == $this->id) {
                if($pick->team_id == $pick->bowl->winner->api_id) {
                    $correctPicks = Arr::prepend($correctPicks, $pick->confidence ?? 0);
                    $score = $score + $pick->confidence;
                }
            }
        }

        $correctPicks = array_filter($correctPicks, function($value){
            return $value > 0;
        });
        $correctPicks = array_reverse(Arr::sort($correctPicks));

        $championshipPick = $picks->where('bowl.championship', true);
        $highScore = reset($correctPicks);

        foreach($championshipPick as $pick) {
                if(isset($pick->bowl->winner) && $pick->team_id == $pick->bowl->winner->api_id) {
                    $score = $score + $highScore;
                }
               
            }

        return $score;

    }
}
