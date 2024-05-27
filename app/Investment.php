<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Investment extends Model
{
   protected $fillable = [
        'plan', 'user_id_fk', 'user_id','amount','sdate','status','transaction_id','slip','payment_mode','active_from',
    ];

      public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    } 

     public static function countTodaysactiveted()
     {

        $data=Investment::where('sdate',Carbon::now()->format('Y-m-d'))->count();
        return ($data?$data:0);
    } 

     public static function counttotal_business()
     {

        $data=Investment::where('status','Active')->sum('amount');
        return ($data?$data:0);
    }
}
