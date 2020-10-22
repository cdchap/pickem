<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bowlHome() 
    {
        return $this->hasMany('App\Models\Bowl', 'home_id', 'id');
    }

    public function bowlVisitor() 
    {
        return $this->hasMany('App\Models\Bowl', 'visitor_id', 'id');
    }

    public function bowlWinner() 
    {
        return $this->hasMany('App\Models\Bowl', 'winner_id', 'id');
    }

    public function picks()
    {
        return $this->hasMany('App\Models\Pick', 'team_id', 'id');
    }

   
}
