<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bowl extends Model
{
    use HasFactory;

    protected $guarded = [];
    
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

    public function picks()
    {
        return $this->hasMany('App\Models\Pick', 'bowl_id', 'id');
    }

    public function getDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('m/d/y');
    }

    public function getKickoffAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('g:iA');
    }

    public function getChannelColorAttribute() 
    {
        return [
            'ESPN' => 'red',
            'ESPN2' => 'pink',
            'ABC' => 'orange',
            'FOX' => 'green',
            'NBC' => 'purple',
            'CBS' => 'gray',
        ][$this->channel] ?? 'cool-gray';
    }

    public function getSemiFinalDisplayAttribute()
    {
        return [
            true => 'Semifinal 🏈',
        ][$this->semi_final] ?? '';
    }
}
