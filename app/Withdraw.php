<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
  protected $fillable = [
        'amount', 'user_id_fk', 'user_id','status','txn_id','payment_mode','paid_date','wdate','account',
    ];

      public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    } 

       public static function CounttotalWithdaw()
     {

        $data=Withdraw::where('status','Approved')->sum('amount');
        return ($data?$data:0);
    } 
      public static function CounttotalPendingWithdaw()
     {

        $data=Withdraw::where('status','Pending')->sum('amount');
        return ($data?$data:0);
    }

    public static function quickRandom($length = 20)
{
    $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
}
}
