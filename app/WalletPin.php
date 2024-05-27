<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletPin extends Model
{
        protected $fillable = [
        'pin', 'user_id','allocated_date','remarks','user_id_fk',
    ];


      public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    } 
}
