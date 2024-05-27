<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  protected $fillable = [
        'category', 'user_id_fk', 'user_id','status','msg','gen_date','closing_date','ticket_no','reply_by',
    ];

      public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    } 

}
