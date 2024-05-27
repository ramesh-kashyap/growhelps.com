<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = [
        'amount', 'level', 'remarks', 'user_id_fk', 'user_id','status','total_business','tdate',
    ];

      public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    } 
}
