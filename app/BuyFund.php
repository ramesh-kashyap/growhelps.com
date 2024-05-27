<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyFund extends Model
{
  protected $fillable = [
        'user_id_fk', 'user_id','amount','bdate','status','txn_no','type',
    ];


      public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    } 
}
