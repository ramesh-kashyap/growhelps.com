<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'url', 'user_id_fk', 'user_id','status','approved_date','tdate',
    ];

      public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    } 
}
