<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsedPin extends Model
{
      protected $fillable = [
        'pin', 'owner','pdate','remarks','user','type',
    ];


   
}
