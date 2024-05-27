<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Income;
use App\User;
use App\Reward;
use App\Payout;
use App\Club_a;
use App\Club_b;
use App\Club_c;
use App\Club_d;
use App\Club_e;
use App\Club_f;
use Validator;
use Hash;
use Carbon\Carbon;
use Log;
use Redirect;
use DB;
use Auth;
use Helper;
class Bonus extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(Request $request)
    {  
       $user=Auth::user();

          $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Income::where('user_id',$user->id)->where('remarks','Performance Bonus')->orderBy('id', 'DESC');      
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('rname', 'LIKE', '%' . $search . '%')          
              ->orWhere('ttime', 'LIKE', '%' . $search . '%')
              ->orWhere('level', 'LIKE', '%' . $search . '%')
              ->orWhere('amt', 'LIKE', '%' . $search . '%')
              ->orWhere('comm', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

    return view('upnl.level_bonus')->with(['level_income'=>$notes])->with('search', $search);
    }


      public function roi_income(Request $request)
    {  
           $user=Auth::user();


          $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Income::where('user_id',$user->id)->where('remarks','C.T.O Bonus')->orderBy('id', 'DESC');
            
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){         
              $q->Where('ttime', 'LIKE', '%' . $search . '%')
              ->orWhere('amt', 'LIKE', '%' . $search . '%')
              ->orWhere('rname', 'LIKE', '%' . $search . '%')
              ->orWhere('comm', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

    return view('upnl.roi_income')->with(['level_income'=>$notes])->with('search', $search);
    }



      public function payment_ledger(Request $request)
    {  
           $user=Auth::user();


          $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Payout::where('user_id',$user->id)->orderBy('id', 'DESC');
            
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){         
              $q->Where('ttime', 'LIKE', '%' . $search . '%')
              ->orWhere('user_id_fk', 'LIKE', '%' . $search . '%')
              ->orWhere('performance_bonus', 'LIKE', '%' . $search . '%')
              ->orWhere('level_bonus', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

    return view('upnl.payment_ledger')->with(['level_income'=>$notes])->with('search', $search);
    }


       public function direct_income(Request $request)
    {  
           $user=Auth::user();


          $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Income::where('user_id',$user->id)->where('remarks','Level Bonus')->orderBy('id', 'DESC');
            
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){         
              $q->Where('ttime', 'LIKE', '%' . $search . '%')
              ->orWhere('rname', 'LIKE', '%' . $search . '%')
              ->orWhere('amt', 'LIKE', '%' . $search . '%')
              ->orWhere('comm', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

    return view('upnl.direct_income')->with(['level_income'=>$notes])->with('search', $search);
    }  

       public function royal_bonus(Request $request)
    {  
           $user=Auth::user();


          $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Income::where('user_id',$user->id)->where('remarks','Royal Magic Bonus')->orderBy('id', 'DESC');
            
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){         
              $q->Where('ttime', 'LIKE', '%' . $search . '%')
              ->orWhere('rname', 'LIKE', '%' . $search . '%')
              ->orWhere('amt', 'LIKE', '%' . $search . '%')
              ->orWhere('comm', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

    return view('upnl.royal_bonus')->with(['level_income'=>$notes])->with('search', $search);
    }  

     public function reward_status(Request $request)
    {  
           $user=Auth::user();

    $this->data['first_lvl'] = Income::where('user_id',$user->id)->where('remarks','Level Bonus')->where('level',1)->count('id');
    $this->data['second_lvl'] = Income::where('user_id',$user->id)->where('remarks','Level Bonus')->where('level',2)->count('id');
    $this->data['third_lvl'] = Income::where('user_id',$user->id)->where('remarks','Level Bonus')->where('level',3)->count('id');
    $this->data['four_lvl'] = Income::where('user_id',$user->id)->where('remarks','Level Bonus')->where('level',4)->count('id');
    $this->data['five_lvl'] = Income::where('user_id',$user->id)->where('remarks','Level Bonus')->where('level',5)->count('id');
    $this->data['six_lvl'] = Income::where('user_id',$user->id)->where('remarks','Level Bonus')->where('level',6)->count('id');
    $this->data['seven_lvl'] = Income::where('user_id',$user->id)->where('remarks','Level Bonus')->where('level',7)->count('id');
    $this->data['eight_lvl'] = Income::where('user_id',$user->id)->where('remarks','Level Bonus')->where('level',8)->count('id');
    $this->data['nine_lvl'] = Income::where('user_id',$user->id)->where('remarks','Level Bonus')->where('level',9)->count('id');
    $this->data['ten_lvl'] = Income::where('user_id',$user->id)->where('remarks','Level Bonus')->where('level',10)->count('id');
    $this->data['eleven_lvl'] = Income::where('user_id',$user->id)->where('remarks','Level Bonus')->where('level',11)->count('id');
    $this->data['twel_lvl'] = Income::where('user_id',$user->id)->where('remarks','Level Bonus')->where('level',12)->count('id');
    $this->data['thirdteen_lvl'] = Income::where('user_id',$user->id)->where('remarks','Level Bonus')->where('level',13)->count('id');
    $this->data['fourteen_lvl'] = Income::where('user_id',$user->id)->where('remarks','Level Bonus')->where('level',14)->count('id');
    $this->data['fiveteen_lvl'] = Income::where('user_id',$user->id)->where('remarks','Level Bonus')->where('level',15)->count('id');
    $this->data['sixteen_lvl'] = Income::where('user_id',$user->id)->where('remarks','Level Bonus')->where('level',16)->count('id');
    $this->data['page'] = 'upnl/reward_status';
    return $this->dashboard_layout();
    }  
    
    public function cto_status(Request $request)
    {  
           $user=Auth::user();

    $user_direct=User::where('sponsor',$user->id)->where('active_status','Active')->count();
    $this->data['direct'] =$user_direct;
    $this->data['page'] = 'upnl/cto_status';
    return $this->dashboard_layout();
    }  

      public function club_status(Request $request)
    {  
           $user=Auth::user();

    $this->data['first_club'] =Club_a::where('user_id',$user->id)->count('id');
    $this->data['first_club_a_lvl'] = $this->my_level_team_count($user->id,'1','club_as');
    $this->data['second_club_a_lvl'] = $this->my_level_team_count($user->id,'2','club_as');
    $this->data['third_club_a_lvl'] = $this->my_level_team_count($user->id,'3','club_as');
    $this->data['four_club_a_lvl'] = $this->my_level_team_count($user->id,'4','club_as');
    $this->data['five_club_a_lvl'] = $this->my_level_team_count($user->id,'5','club_as');
    $this->data['six_club_a_lvl'] = $this->my_level_team_count($user->id,'6','club_as');
    $this->data['seven_club_a_lvl'] = $this->my_level_team_count($user->id,'7','club_as');

   $this->data['second_club'] =Club_b::where('user_id',$user->id)->count('id');
    $this->data['first_club_b_lvl'] = $this->my_level_team_count($user->id,'1','club_bs');
    $this->data['second_club_b_lvl'] = $this->my_level_team_count($user->id,'2','club_bs');
    $this->data['third_club_b_lvl'] = $this->my_level_team_count($user->id,'3','club_bs');
    $this->data['four_club_b_lvl'] = $this->my_level_team_count($user->id,'4','club_bs');
    $this->data['five_club_b_lvl'] = $this->my_level_team_count($user->id,'5','club_bs');
    $this->data['six_club_b_lvl'] = $this->my_level_team_count($user->id,'6','club_bs');
    $this->data['seven_club_b_lvl'] = $this->my_level_team_count($user->id,'7','club_bs');


   $this->data['third_club'] =Club_c::where('user_id',$user->id)->count('id');
    $this->data['first_club_c_lvl'] = $this->my_level_team_count($user->id,'1','club_cs');
    $this->data['second_club_c_lvl'] = $this->my_level_team_count($user->id,'2','club_cs');
    $this->data['third_club_c_lvl'] = $this->my_level_team_count($user->id,'3','club_cs');
    $this->data['four_club_c_lvl'] = $this->my_level_team_count($user->id,'4','club_cs');
    $this->data['five_club_c_lvl'] = $this->my_level_team_count($user->id,'5','club_cs');
    $this->data['six_club_c_lvl'] = $this->my_level_team_count($user->id,'6','club_cs');
    $this->data['seven_club_c_lvl'] = $this->my_level_team_count($user->id,'7','club_cs');
   
   $this->data['four_club'] =Club_d::where('user_id',$user->id)->count('id');
    $this->data['first_club_d_lvl'] = $this->my_level_team_count($user->id,'1','club_ds');
    $this->data['second_club_d_lvl'] = $this->my_level_team_count($user->id,'2','club_ds');
    $this->data['third_club_d_lvl'] = $this->my_level_team_count($user->id,'3','club_ds');
    $this->data['four_club_d_lvl'] = $this->my_level_team_count($user->id,'4','club_ds');
    $this->data['five_club_d_lvl'] = $this->my_level_team_count($user->id,'5','club_ds');
    $this->data['six_club_d_lvl'] = $this->my_level_team_count($user->id,'6','club_ds');
    $this->data['seven_club_d_lvl'] = $this->my_level_team_count($user->id,'7','club_ds');
   
   $this->data['five_club'] =Club_d::where('user_id',$user->id)->count('id');
    $this->data['first_club_e_lvl'] = $this->my_level_team_count($user->id,'1','club_es');
    $this->data['second_club_e_lvl'] = $this->my_level_team_count($user->id,'2','club_es');
    $this->data['third_club_e_lvl'] = $this->my_level_team_count($user->id,'3','club_es');
    $this->data['four_club_e_lvl'] = $this->my_level_team_count($user->id,'4','club_es');
    $this->data['five_club_e_lvl'] = $this->my_level_team_count($user->id,'5','club_es');
    $this->data['six_club_e_lvl'] = $this->my_level_team_count($user->id,'6','club_es');
    $this->data['seven_club_e_lvl'] = $this->my_level_team_count($user->id,'7','club_es');
   
   $this->data['six_club'] =Club_d::where('user_id',$user->id)->count('id');
    $this->data['first_club_f_lvl'] = $this->my_level_team_count($user->id,'1','club_fs');
    $this->data['second_club_f_lvl'] = $this->my_level_team_count($user->id,'2','club_fs');
    $this->data['third_club_f_lvl'] = $this->my_level_team_count($user->id,'3','club_fs');
    $this->data['four_club_f_lvl'] = $this->my_level_team_count($user->id,'4','club_fs');
    $this->data['five_club_f_lvl'] = $this->my_level_team_count($user->id,'5','club_fs');
    $this->data['six_club_f_lvl'] = $this->my_level_team_count($user->id,'6','club_fs');
    $this->data['seven_club_f_lvl'] = $this->my_level_team_count($user->id,'7','club_fs');
   
    $this->data['page'] = 'upnl/club_status';
    return $this->dashboard_layout();
    }  


    public function my_level_team_count($userid,$round,$table,$level=2){
        $arrin=array($userid);
        $ret=array();

        $i=1;
        while(!empty($arrin)){
            $alldown=DB::table($table)->select('user_id')->whereIn('ParentId',$arrin)->where('round',$round)->get()->toArray();     
            if(!empty($alldown)){
                $arrin = array_column($alldown,'user_id');
                $ret[$i]=$arrin;
                $i++;
                if($i>$level){
                    break;
                }
              
            }else{
                $arrin = array();
            } 
        }   
       
      
        $final = array();         
        if(!empty($ret)){
            array_walk_recursive($ret, function($item, $key) use (&$final){
                $final[] = $item;
            });
        }
        //  print_r($final);die;
        
        return count($final);
        
    }

       public function global_community_income(Request $request)
    {  
           $user=Auth::user();


          $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Income::where('user_id',$user->id)->where('remarks','Leadership Bonus')->orderBy('id', 'DESC');
            
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){         
              $q->Where('ttime', 'LIKE', '%' . $search . '%')
              ->orWhere('amt', 'LIKE', '%' . $search . '%')
              ->orWhere('comm', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

    return view('upnl.global-community-bonus')->with(['level_income'=>$notes])->with('search', $search);
    }
}
