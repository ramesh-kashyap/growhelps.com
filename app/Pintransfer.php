<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pintransfer extends Model
{
  protected $fillable = [
        'to', 'user_id_fk', 'user_id','from','pin','tdate','remarks','pin_type',
    ];

      public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    } 
}
