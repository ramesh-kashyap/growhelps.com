<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
use Carbon\Carbon;
use Schema;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $fillable = [
        'name', 'email', 'password','phone','username','sponsor','ParentId','position','active_status','jdate','level','tpassword','adate','PSR','TPSR','country','pamount',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


     public function Level_bonus(){
        return $this->hasMany('App\Income','user_id','id')->where('remarks','Level Bonus');
    } 
    
    public function Fund_wallet()
    {
        return $this->hasMany('App\BuyFund','user_id','id')->where('status','Approved');
    }
  
   public function GeneratePinAmt()
    {
        return $this->hasMany('App\GeneratePin','user_id','id')->where('wallet',1);
    }
     
   public function GeneratePinAmtUsr()
    {
        return $this->hasMany('App\GeneratePin','user_id','id')->where('wallet',2);
    }

    public function available_balance()
    {
   $balance = Auth::user()->users_incomes->sum('comm')- (Auth::user()->withdraw->sum('amount'));
   return $balance;
    } 
    


     public function users_incomes()
     {
        return $this->hasMany('App\Income','user_id','id');
     } 

     public function withdraw()
     {
        return $this->hasMany('App\Withdraw','user_id','id')->where('status','!=','Failed');
    } 
     public function availablePin()
     {
        return $this->hasMany('App\WalletPin','user_id','id');
    } 

    public function royal_magic_bonus()
    {
        return $this->hasMany('App\Income','user_id','id')->where('remarks','Royal Magic Bonus');
    } 
  public function matching_bonus(){
        return $this->hasMany('App\Income','user_id','id')->where('remarks','Performance Bonus');
    } 
    public function community_bonus(){
        return $this->hasMany('App\Income','user_id','id')->where('remarks','CTO Bonus');
    } 
  


    public function investment(){
        return $this->hasMany('App\Investment','user_id','id')->where('status','Active');
    }
    public function investment_adm()
    {
        return $this->hasMany('App\Investment','user_id','id');
    }

     public static function countActiveuser()
     {
        $data=User::where('active_status','Active')->count();
        return ($data?$data:0);
    } 
    public static function countPendinguser()
     {
        $data=User::where('active_status','Pending')->count();
        return ($data?$data:0);
    }
     public static function countAlluser()
     {
        $data=User::count();
        return ($data?$data:0);
    }
   
    public static function countTodaysuser()
     {

        $data=User::where('jdate',Carbon::now()->format('Y-m-d'))->count();
        return ($data?$data:0);
    }

    


     
   
  
}
