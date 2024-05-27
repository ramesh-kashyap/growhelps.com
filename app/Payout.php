<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
  protected $fillable = [
        'performance_bonus', 'user_id_fk', 'user_id','distributor_bonus','ttime','level_bonus','cto_bonus','magic_bonus','total','deduction','withdraw_amt','club_deduction',
    ];

      public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    } 
}
