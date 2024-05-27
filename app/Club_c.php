<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club_c extends Model
{
   protected $fillable = [
        'added_by', 'user_id','username','ParentId','level','position','round',
    ];


      public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    } 
}
