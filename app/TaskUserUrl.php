<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskUserUrl extends Model
{
   protected $fillable = [
        'url','tdate','user_id','status',
    ];
}
