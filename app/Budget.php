<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = ['mounth', 'year','proceeds', 'expense', 'savings'];
}
