<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Investment;
use App\WalletPin;
use App\User;
use App\UsedPin;
use Validator;
use Hash;
use Carbon\Carbon;
use Log;
use Redirect;
use DB;
use Auth;
use Helper;

class Activation extends Controller
{


   public function __construct()
    {
        $this->middleware('auth');
        // ini_set('extension', 'php_fileinfo.so');
    }


   public function index()
    {
        return view('upnl.make_deposit');
    }

     public function deposit_list()
    {  

      $user=Auth::user();
      $data = Investment::where('user_id',$user->id)->orderBy('id','desc')->get();
      return view('upnl.deposit_list')->with(['deposit_list'=>$data]);
    }


        public function get_all_pins_filter(Request $request)
        {
         $user=Auth::user();
         $data = WalletPin::select('pin')->where('user_id',$user->id)->where('remarks',$request->type)->get();
         echo json_encode($data);
        }


    public function SubmitActivation(Request $request)
    {



  
     try{
            $validation =  Validator::make($request->all(), [
                // 'user_id' => 'required',
                'amount' => 'required',
                'user_id' => 'required|exists:users,username',
                 'pin' => 'required|exists:wallet_pins,pin',
               
              
            ]);

            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
               $user=Auth::user();
                 

           $user_detail=User::where('username',$request->user_id)->orderBy('id','desc')->limit(1)->first();

                $invest_check=Investment::where('user_id',$user_detail->id)->orderBy('id','desc')->limit(1)->first();
                  $invoice = substr(str_shuffle("0123456789"), 0, 7);


                    if(empty($invest_check))
                     {

                

                   $data = [
                        'plan' => 1,
                        'transaction_id' =>$request->pin,
                        'user_id' => $user_detail->id,
                        'user_id_fk' => $user_detail->username,
                        'amount' => $request->amount,
                        'payment_mode' => 'INR',
                        'status' => 'Active',
                        'sdate' => Date("Y-m-d"),
                        'active_from' => $user->username,
                        
                    ];
                    $payment =  Investment::create($data);

                     $remarks='Buy Package For '.$user_detail->username;
         
            $value=array('pin'=>$request->pin,'pdate'=>Date("Y-m-d"),'owner'=>$user->username,'user'=>$request->user_id,'remarks'=>$remarks,'type'=>$request->amount);
              $pins =  UsedPin::create($value);
              WalletPin::where('pin',$request->pin)->delete();
              // $val=array('active_status'=>'Active','adate'=>date("Y-m-d H:i:s");
             
                User::where('id', $user_detail->id)->update(array('active_status'=>'Active','adate'=>date("Y-m-d H:i:s")));
     
               User::where('id',$user_detail->id)->update(['package' => $request->amount,'pamount' =>2500]);
             return redirect()->route('make-deposit')->with('messages', $user_detail->username.' CONGRATULATIONS  YOU HAVE SUCCESSFULLY  ACTIVATION');

      
              }
              else
              {
                 return Redirect::back()->withErrors(array($user_detail->username.' User Already Active'));
              }
                 

          }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
            die("hi");
            return  redirect()->route('make-deposit')->withErrors('error', $e->getMessage())->withInput();
              }
        }





    public function SubmitBuyFund(Request $request)
    {


      try{
            $validation =  Validator::make($request->all(), [
                // 'user_id' => 'required',
                'amount' => 'required|numeric|min:10',
                'type' => 'required',
               
               
              
            ]);

            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
            $user=Auth::user();
            
                $invest_check=Investment::where('user_id',$user->id)->where('amount',$request->amount)->orderBy('id','desc')->first();
                  $invoice = substr(str_shuffle("0123456789"), 0, 7);
              if (!empty($invest_check))
               {
                
                 return Redirect::back()->withErrors(array('this Package already Added Error'));
              }
              else
              {
              
               $invest_check=Investment::where('user_id',$user->id)->where('status','Pending')->orderBy('id','desc')->first();

                if (!empty($invest_check))
               {
                
                 return Redirect::back()->withErrors(array('Your Package already Pending Error'));
              }

              $invest_check=Investment::where('user_id',$user->id)->orderBy('id','desc')->first();
               $invest_check_amt=(!empty($invest_check))?$invest_check->amount:0;
              $amt=$request->amount;
              $type=$request->type;

                if ($amt<=$invest_check_amt) 
                {
                return Redirect::back()->withErrors(array('Your have to choose other pakcage'));
                }


            $data['coin']=$type;
            $data['d_amt']=$amt;
              
           $request = [
          'amount' => $amt,
          'currency1' => 'USD',
          'currency2' => $type,
          'buyer_email' => 'rameshkashyap8801@gmail.com',
          'item' => "Donate to kashyap8801",
          ];
           
         $result=Helper::CreateTransaction($request);
         // print_r($result);die;
         $data['txn']=@$result['result']['txn_id'];
         $data['add']=@$result['result']['address'];
         $data['amount']=@$result['result']['amount'];
         $data['qr']=@$result['result']['qrcode_url'];
                  
                return view('upnl.payment')->with('result', $data); 
              }
                 

          }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
            die("hi");
            return  redirect()->route('make-deposit')->withErrors('error', $e->getMessage())->withInput();
        }

    }


}
