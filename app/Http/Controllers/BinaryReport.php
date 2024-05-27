<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\User;
use App\Investment;
use Validator;
use Hash;
use Carbon\Carbon;
use Log;
use Redirect;
use DB;
use Auth;
use Helper;

class BinaryReport extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


     public function userReport(Request $request)
    {  
    $userName = $request->username;  
   
    $user_deatils=Helper::runQuery('id','users',$userName,'username'); 
    $left =   $this->leftReport($user_deatils->id);
    $right =   $this->rightReport($user_deatils->id);
    return response()->json(['right' =>$right, 'left' => $left]);
   
    
    }




    public function rightReport($user_id){
          
            $right_team =  $this->team_by_position($user_id,'Right');
          
            $check_ex=Helper::runQuery('package','users',$user_id,'id');
              if (!empty($right_team))
                   {
                     // $right_business=$this->get_total_invest_by_team($right_team);
                      $right_business=User::select('id')->whereIn('id',$right_team)->where('active_status','Active')->count();
                  }
                  else
                  {
                    $right_business=0;
                  }
            $data['right_total_user']=(!empty($right_team))?count($right_team):0;;
            $data['right_total_business']=$right_business;
            $data['right_todays_business']=(@$check_ex->package)?$check_ex->package:0;
        
            
            return $data;
        }

    public function leftReport($user_id){
            //$user_id=$this->session->userdata("user_id_session");
          
             $user_deatils=Helper::runQuery('jdate','users',$user_id,'id');
             $left_team =  $this->team_by_position($user_id,'Left');
             // print($left_team);die();
              if (!empty($left_team))
                   {
                     // $left_business=$this->get_total_invest_by_team($left_team);
                     $left_business=User::select('id')->whereIn('id',$left_team)->where('active_status','Active')->count();
                  }
                  else
                  {
                    $left_business=0;
                  }
                $data['left_total_user']=(!empty($left_team))?count($left_team):0;
                $data['left_total_business']=$left_business;
                $data['left_todays_business']=($user_deatils->jdate)? $user_deatils->jdate:"N/A";
                


                return $data;
        }



     public function get_total_invest_by_team($user_ids)
    {
      
     $business= Investment::whereIn('user_id',$user_ids)->where('status','Active')->sum('amount');
     return $business;
        
    }
    


      public  function my_binary($userid){
        $arrin=array($userid);
        $ret=array();
        // print_r($arrin);die();
        while(!empty($arrin)){
         $alldown= User::select('id')->whereIn('Parentid',$arrin)->get()->toArray();
         if(!empty($alldown)){
                $arrin = array_column($alldown,'id');
                $ret[]=$arrin;
              
              
            }else{
                $arrin = array();
            } 
        }
        // continue;    
        $final = array();         
        if(!empty($ret)){
            array_walk_recursive($ret, function($item, $key) use (&$final){
                $final[] = $item;
            });
        }

        return $final;
        
    }  


     public  function team_by_position($userid,$position){
        $ret=array();
        $get_position_user=User::where('Parentid',$userid)->where('position',$position)->first();
        if($get_position_user){
        
            $ret=$this->my_binary($get_position_user->id);
            $ret[]=$get_position_user->id;
        }
       
        return $ret;
    }


}
