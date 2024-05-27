<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddTaskLimit extends Model
{
     protected $fillable = [
        'limit','tdate',
    ];

}
