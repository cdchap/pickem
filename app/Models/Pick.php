<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pick extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function season()
    {
        return $this->belongsTo('App\Models\Season');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function bowl()
    {
        return $this->belongsTo('App\Models\Bowl',);
    }

    public function team()
    {
        return $this->belongsTo('App\Models\Team', 'team_id', 'api_id');
    }


}
