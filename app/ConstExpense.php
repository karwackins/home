<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConstExpense extends Model
{
        protected $fillable = ['name','mounth', 'year', 'amount', 'status'];
}
