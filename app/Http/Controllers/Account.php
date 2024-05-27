<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Helper;
use App\Mail\SendMail;
use App\User;
use App\Investment;
use App\Income;
use App\Bank;
use Validator;
use Hash;
use Carbon\Carbon;
use Log;
use Redirect;
use DB;
use Auth;
use DatePeriod;
use DateInterval;
use DateTime;

class Account extends Controller
{
    
 private $downline="";
    public function index()
    {
        return view('auth.register_sucess');
    }

          public function forgot_password()
    {
        return view('auth.forgot_password');
    }
    
         public function register(Request $request)
    {
        try{
           $validation =  Validator::make($request->all(), [
                'email' => 'required',
                'name' => 'required',
                'password' => 'required|min:5|confirmed',
                'sponsor' => 'required|exists:users,username',
                'phone' => 'required|numeric|min:10'
              
            ]);

            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
            //check if email exist
          
            $user = Helper::runQuery("*","users",$request->sponsor,"username");
            if(empty($user))
            {
                return Redirect::back()->withErrors(array('Introducer ID Not Active'));
            }
        
           $username ="GH".substr(rand(),-2).substr(time(),-2).substr(mt_rand(),-2);
           $tpassword =substr(time(),-2).substr(rand(),-2).substr(mt_rand(),-1);
            $post_array  = $request->all();
                //  
          
            $data['name'] = $post_array['name'];
            $data['phone'] = $post_array['phone'];
            $data['username'] = $username;
            $data['email'] = $post_array['email'];
            $data['password'] =   Hash::make($post_array['password']);
            $data['tpassword'] =   Hash::make($tpassword);
            $data['PSR'] =  $post_array['password'];
            // $data['position'] =  $post_array['position'];
            // $data['country'] =  $post_array['country'];
            $data['TPSR'] =  $tpassword;
            $data['sponsor'] = $user->id;
            $data['package'] = 0;
            $data['jdate'] = date('Y-m-d');
            $data['created_at'] = Carbon::now();
            $data['remember_token'] = substr(rand(),-7).substr(time(),-5).substr(mt_rand(),-4);
           $sponsor_user =  User::orderBy('id','desc')->limit(1)->first();
           $data['level'] = $user->level+1;

         
           $data['ParentId'] =  $sponsor_user->id;
            $user_data =  User::create($data);
          
            $registered_user_id = $user_data['id'];
//   dd($registered_user_id);
              $bank_array=array(

                 'user_id'=>$registered_user_id,
                 'bank_name'=>$request->bank_name,
                 'account_holder'=>$request->account_holder,
                 'branch_name'=>$request->branch_name,
                 'account_no'=>$request->account_number,
                 'ifsc_code'=>$request->ifsc_code,                
             );
              $bank=Bank::create($bank_array);
              
            // Auth::loginUsingId($registered_user_id);
            $mail_data=array('name'=>$data['name'],'username'=>$data['username'],'password'=>$data['password'],'subject'=>'Welcome To BET KRY','viewpage'=>'register_sucess');
            // \Mail::to($data['email'])->send(new SendMail($mail_data));
            
            

            // return redirect()->route('home');
             return redirect()->route('register_sucess')->with('messages', $data);

        }
        catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
            die("hi");
            return back()->withErrors('error', $e->getMessage())->withInput();
           
        }

          
    } 


      public function login(Request $request)
    {
      
            $validation =  Validator::make($request->all(), [
                'username' => 'required|unique:users',
                'password' => 'required|string',

            ]);
        
            // dd($request);
            $post_array  = $request->all();
            $credentials = $request->only('username', 'password');
            
        //     print_r($credentials);die;
        //     if (! $request->isMethod('post')) 
        //     {
           
        //   }

            
           
            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                if($user->active_status=="Block")
                {
                Auth::logout();
               return Redirect::back()->withErrors(array('You are Blocked by admin'));
                }

                
              // add Roi Income
              $activation_date = $user->adate;
              $activation_date = date('Y-m-d', strtotime($activation_date));
              $activation_date=  date('Y-m-d', strtotime("+ 1 day", strtotime($activation_date)));
             $Investment_=Investment::where('user_id',$user->id)->where('roiCandition',0)->where('status','Active')->get();
             $check_ex=Income::where('user_id',$user->id)->where('remarks','Roi Bonus')->orderBy('id','DESC')->limit(1)->first();

             if (!empty($Investment_))
              {
               
               foreach ($Investment_ as $key => $value)
                {

              $activation_date = $value->sdate;
              $activation_date=  date('Y-m-d', strtotime("+ 1 day", strtotime($activation_date)));
                 if (!empty($check_ex))
                  {
                    $activation_date = $check_ex->ttime;
                  }
                  $joining_amt = $value->amount;
                  $percent=0.75;
                   if ($value->plan=="1")
                    {
                      $percent=0.5;
                    }
                    elseif ($value->plan=="2") 
                    {
                      $percent=1;
                    }
                     elseif ($value->plan=="3") 
                    {
                      $percent=1;
                    }
                  $roi = $joining_amt*$percent/100;   

                    $begin = new DateTime($activation_date);
                            $today =  date('Y-m-d');

                         
                         $stop_date=  date('Y-m-d', strtotime("+ 1 day", strtotime($today)));
                            $end = new DateTime($stop_date);

                            $interval = DateInterval::createFromDateString('1 day');
                            $period = new DatePeriod($begin, $interval, $end);
    
                            foreach ($period as $dt) {
                                $day_number  =  $dt->format("N"); //1 for Monday, 7 for Sunday
                                
                             
                               $total_profit_b = Income::where('user_id', $user->id)->where('invest_id', $value->id)->where('remarks','Roi Bonus')->count();
                               $total_profit=($total_profit_b)?$total_profit_b:0;
                               // $total_get=$joining_amt*200/100;
                               // print_r($total_get);
                               // echo "<pre>";
                               //   print_r($total_profit);die();
                                if ($total_profit_b<100) 
                                {
                                $data['remarks'] = 'Roi Bonus';
                                $data['comm'] = $roi;
                                $data['amt'] = $joining_amt;
                                $data['invest_id']=$value->id;
                                $data['ttime'] = $dt->format("Y-m-d");
                                $data['created_at'] = $dt->format("Y-m-d 01:22:12");
                                $data['updated_at'] = $dt->format("Y-m-d 01:22:12");
                                $data['user_id_fk'] = $user->username;
                                $data['user_id']=$user->id; 

                       // $income = Income::firstOrCreate(['remarks' => 'Roi Bonus','ttime'=>$dt->format("Y-m-d"),'user_id'=>$user->id,'invest_id'=>$value->id],$data);
                                }
                                else
                                {
                                 Investment::where('id',$value->id)->update(['roiCandition' => 1]);   
                                }



                                
                            }
                } 
                     
              // end Roi Income 


              }




              
                

                return redirect()->route('home');
            }
            else
            {
                // echo "credentials are invalid"; die;
                return Redirect::back()->withErrors(array('Invalid Username & Password !'));
            }
        
        

    }


  public function authenticate(Request $request)
    {
         $validation =  Validator::make($request->all(), [
                'username' => 'required|unique:users',
                'password' => 'required|string',

            ]);

        $credentials = User::where('username',$request->username)->where('password',$request->password)->first();

        if ($credentials)
        {
         return redirect()->intended('home');
        }
        
    }

       public function my_level_team_count($userid,$level=20){
        $arrin=array($userid);
        $ret=array();

        $i=1;
        while(!empty($arrin)){
            $alldown=User::select('id')->whereIn('sponsor',$arrin)->get()->toArray();     
            if(!empty($alldown)){
                $arrin = array_column($alldown,'id');
                $ret[$i]=$arrin;
                $i++;
                if($i>$level){
                    break;
                }
            }else{
                $arrin = array();
            } 
        }   
       
       return $ret;
        
    }


    public function forgot_password_submit(Request $request)
    {
         $validation =  Validator::make($request->all(), [
                'username' => 'required|unique:users',

            ]);

        $credentials = User::where('username',$request->username)->first();
 
        if ($credentials)
        {
         
           $mail_data=array('name'=>$credentials->name,'username'=>$credentials->username,'password'=>$credentials->PSR,'tpassword'=>$credentials->TPSR,'subject'=>'Forgot Password ','viewpage'=>'forgot_sucess');
            // \Mail::to($credentials->email)->send(new SendMail($mail_data));
        }
        
        return redirect()->route('forgot-password')->with('messages', ' Forgot Password Successfully Check Your Registration E-mail ID');
        
    }

    public function getUserNameAjax(Request $request)
    {

     $user = Helper::runQuery("*","users",$request->user_id,"username");
            if(!empty($user))
            {
                return $user->name;
            } 
            else{
                return 1;
            }       
    }


    public function logout(Request $request) 
    {
        Auth::logout();
     return redirect('/login');
     }


    
public function find_position($snode,$pos)
{
    $q=User::select('id')->where('Parentid',$snode)->where('position',$pos)->first();
    if (empty($q))
     {
       $this->downline = $snode; 
     }
     else
     {
      $user = $q->id;
        // print_r($user);die();
      $this->find_position($user,$pos);   
     }
}
}
