<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Event extends Model
{
    protected $fillable = [
        'user_id', 'content', 'data_event', 'file', 'budget'
    ];

    function User()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
