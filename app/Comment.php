<?php

namespace App;
use App\User;
use App\Event;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'content'];

    function User()
    {
        return $this->belongsTo('App\User');
    }

    function Post()
    {
        return $this->belongsTo('App\Event');
    }
}
