<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{

 protected $fillable = [
        'user_id', 'user_id_fk', 'amt','comm','remarks','ttime','level','tleft','tright','rname','fullname','invest_id','updated_at','created_at','pair200','pair400','pair1000','amount','admin_charge','tds','rank',
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    } 

        public static function count_level_bonus()
     {

        $data=Income::where('remarks','Performance Bonus')->sum('comm');
         return ($data?$data:0);
    }
   public static function Count_roi_bonus()
     {

        $data=Income::where('remarks','C.T.O Bonus')->sum('comm');
        return ($data?$data:0);
    }
  
  public static function countReferal_bonus()
     {

        $data=Income::where('remarks','Level Bonus')->sum('comm');
        return ($data?$data:0);
    }
 public static function countCommunity_bonus()
     {

        $data=Income::where('remarks','Royal Magic Bonus')->sum('comm');
        return ($data?$data:0);
    }


 public static function CountTotalIncome()
     {

        $data=Income::sum('comm');
        return ($data?$data:0);
    }

}
