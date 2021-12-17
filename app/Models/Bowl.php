<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Bowl extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function home() 
    {
        return $this->belongsTo('App\Models\Team', 'home_id', 'api_id');
    }

    public function visitor()
    {
        return $this->belongsTo('App\Models\Team', 'visitor_id', 'api_id');
    }

    public function winner()
    {
        return $this->belongsTo('App\Models\Team', 'winner_id', 'api_id');
    }

    public function picks()
    {
        return $this->hasMany('App\Models\Pick', 'bowl_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getDateAttribute()
    {
        return \Carbon\Carbon::parse($this->start_date)->toFormattedDateString();
    }

    public function getKickoffAttribute()
    {
        return \Carbon\Carbon::parse($this->start_date)->format('g:i');
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
    public function getChampionshipDisplayAttribute()
    {
        return [
            true => 'Championship 🏆',
        ][$this->championship] ?? '';
    }
    public function getSpread() {
        $response =  Http::withHeaders([
            'Authorization' => 'Bearer ' . config('app.cfbd_token')
            ])
        ->get('https://api.collegefootballdata.com/lines?gameId='.$this->api_id.'&year='.$this->season.'&seasonType=postseason')->json();
        return  $response[0]['lines'][0]['formattedSpread'];
    }
}
