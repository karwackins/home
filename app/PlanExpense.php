<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanExpense extends Model
{
    protected $fillable = ['name','mounth', 'year', 'amount', 'status'];
}
