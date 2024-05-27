<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    

    protected $guarded = [];
    protected $table='admins';

   public static function return_by_dynamic($data) {
        return Admin::where($data['dynamic_column'], $data['dynamic_value'])->select('*')->first();
    }

  
}
