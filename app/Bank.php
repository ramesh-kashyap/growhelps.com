<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
   protected $fillable = [
        'account_holder', 'bank_name', 'user_id','branch_name','account_no','ifsc_code',
    ];

}
