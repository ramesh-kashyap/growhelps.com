<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Mail\SendMail;
use Auth;
use App\Investment;
use App\User;
use App\Ticket;
use Validator;
use Hash;
use Carbon\Carbon;
use Log;
use Redirect;
use DB;
use QrCode;
use DatePeriod;
use DateInterval;
use DateTime;

use Helper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     $user=Auth::user();
   $user_direct=User::where('sponsor',$user->id)->count();
   $tolteam=$this->my_level_team_count($user->id);
   $total_team=(!empty($tolteam)?count($tolteam):0);
   $left_team=$this->team_by_position($user->id,'Left');               
   $right_team=$this->team_by_position($user->id,'Right');               


       
    $this->data['user_direct'] = $user_direct;
    $this->data['total_team'] = $total_team;
    $this->data['left_active'] =User::select('id')->whereIn('id',$left_team)->where('active_status','Active')->count();
    $this->data['left_business'] =Investment::whereIn('user_id',$left_team)->where('status','Active')->sum('amt');
    $this->data['right_business'] =Investment::whereIn('user_id',$right_team)->where('status','Active')->sum('amt');
    $this->data['right_active'] =User::select('id')->whereIn('id',$right_team)->where('active_status','Active')->count();
    $this->data['left_team'] = (!empty($left_team)?count($left_team):0);
    $this->data['right_team'] = (!empty($right_team)?count($right_team):0);
    $this->data['page'] = 'upnl/home';
    return $this->dashboard_layout();
    }


        public function my_level_team_count($userid,$level=10){
        $arrin=array($userid);
        $ret=array();

        $i=1;
        while(!empty($arrin)){
            $alldown=User::select('id')->whereIn('ParentId',$arrin)->get()->toArray();     
            if(!empty($alldown)){
                $arrin = array_column($alldown,'id');
                $ret[$i]=$arrin;
                $i++;
              
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
        
        
        return $final;
        
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


    public function AddUser()
    {
   $apiURL = 'https://mercury-uat.phonepe.com/v4/debit/';
        $postInput = [
        'MerchantID' => 'M2306160483220675579140',
        'TransactionID' => 'TX123456789',
        'UserID' => 'U123456789',
        'amount' => 100,
        // // 'merchantOrderId' => 'OD1234',
        // 'mobileNumber' => '8053461772',
        // 'message' => 'payment for order placed OD1234',
        // 'subMerchant' => 'DemoMerchant',
        // 'email' => 'rameshkashyap8801@gmail.com',
        // 'shortName' => 'Ramesh',
        ];
  
        $headers = [
            'Accept' => 'text/plain',
    'Content-Type' => 'application/json',
    // 'X-CALLBACK-URL' => 'https://www.demoMerchant.com/callback',
        ];
  
        $response = Http::withHeaders($headers)->post($apiURL, $postInput);
  
        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);
        dd($responseBody);
   
$apiURL = 'http://18.213.192.115/api/v1/addBalance';
        $postInput = [
        'userId' => 'RK10002',
        'amount' => '100',
        ];
  
        $headers = [
            'authToken' => '1234'
        ];
  
        $response = Http::withHeaders($headers)->post($apiURL, $postInput);
  
        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);
     
        dd($responseBody);
   

    }
    
    
       public function generate_ticket()
    {
         $user=Auth::user();
      
        return view('upnl.generate_ticket');
    }
      
       public function WelcomeLetter()
    {
         $user=Auth::user();
    $user_direct=User::where('id',$user->sponsor)->first();
    
    $this->data['users_details'] =  $user;
    $this->data['sponsor'] =  $user_direct;
    $this->data['page'] = 'upnl/WelcomeLetter';
    return $this->dashboard_layout();
    }
    
    
        public function Generate_ticket_submit(Request $request)
    {


      try{
            $validation =  Validator::make($request->all(), [
                // 'user_id' => 'required',
                'category' => 'required',
                'message' => 'required',
               
               
              
            ]);

            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
            $user=Auth::user();
            $ticket_no=$request->ticket_no;
            $category=$request->category;
            $message=$request->message;
                     if($ticket_no != ""){

               $check_tacket =Ticket::where('user_id',$user->id)->where('ticket_no',$ticket_no)->first();

               if(!empty($check_tacket)){
                   $ticket_no_final = $ticket_no;
               }
               else{
                   
                   return Redirect::back()->withErrors(array('Ticket does not exist'));
                   
                  die();
               }
             
                 }
                 else{
                    $ticket_no_final = rand(1000000000,9999999999);
                 }
              
               $data_to_insert = array(
                              'user_id_fk' => $user->username, 
                              'user_id' => $user->id, 
                              'category'   => $category, 
                              'msg'        => $message, 
                              'gen_date'   => date('Y-m-d'), 
                              'closing_date' => NULL, 
                              'ticket_no' => $ticket_no_final, 
                             
                              'status'       => false,
                              'reply_by'     => 'user'
                            );
             
                  $payment =  Ticket::create($data_to_insert);
              
        return redirect()->route('generate-ticket')->with('messages', 'Generate Ticket successfully');


          }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
            die("hi");
            return  redirect()->route('generate-ticket')->withErrors('error', $e->getMessage())->withInput();
        }

    }
    
    
    
    
  public function support_message(Request $request)
    {

    	 $user=Auth::user();

          $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Ticket::where('user_id',$user->id)->groupBy('ticket_no');      
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('user_id_fk', 'LIKE', '%' . $search . '%')          
              ->orWhere('category', 'LIKE', '%' . $search . '%')
              ->orWhere('status', 'LIKE', '%' . $search . '%')
              ->orWhere('gen_date', 'LIKE', '%' . $search . '%')
              ->orWhere('ticket_no', 'LIKE', '%' . $search . '%')
              ->orWhere('reply_by', 'LIKE', '%' . $search . '%')
              ->orWhere('closing_date', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

       return view('upnl.support-message')->with(['level_income'=>$notes])->with('search', $search);;
    }

 public function viewMessage(Request $request)
    {

    	 $user=Auth::user();

                $id= $request->ticket_no ; // or any params
       
        $profile = Ticket::where('ticket_no',$id)->get();
       return view('upnl.viewMessage')->with(['open_ticket_msg'=>$profile]);
    }



    
}
