<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bowl extends Model
{
    use HasFactory;

    public function season() 
    {
        return $this->belongsTo('App\Models\Season');
    }

    public function home() 
    {
        return $this->belongsTo('App\Models\Team', 'home_id');
    }

    public function visitor()
    {
        return $this->belongsTo('App\Models\Team', 'visitor_id');
    }

    public function winner()
    {
        return $this->belongsTo('App\Models\Team', 'winner_id');
    }

}
