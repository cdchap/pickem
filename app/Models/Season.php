<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function bowls() {
        return $this->hasMany('App\Models\Bowl', 'season', 'season');
    }

    public function picks()
    {
        return $this->hasMany('App\Models\Pick', 'season_id', 'id');
    }
}
