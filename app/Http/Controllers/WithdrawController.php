<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\User;
use App\Withdraw;
use App\Bank;
use Validator;
use Hash;
use Carbon\Carbon;
use Log;
use Redirect;
use DB;
use Auth;
use Helper;

class WithdrawController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

      public function index()
    {
        $user=Auth::user();
       $bank_details=Bank::where('user_id',$user->id)->first();
        return view('upnl.withdrawfund')->with(compact('bank_details'));
    }


      public function withdraw_report(Request $request)
    {  
           $user=Auth::user();


          $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Withdraw::where('user_id',$user->id);
            
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){         
              $q->Where('wdate', 'LIKE', '%' . $search . '%')
              ->orWhere('amount', 'LIKE', '%' . $search . '%')
              ->orWhere('status', 'LIKE', '%' . $search . '%')
              ->orWhere('txn_id', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

    return view('upnl.withdraw_report')->with(['withdraw_report'=>$notes])->with('search', $search);
    }



    public function WithdrawRequest(Request $request)
    {
    

      try{
            $validation =  Validator::make($request->all(), [
                // 'user_id' => 'required',
                'amount' => 'required|numeric|min:100',               
                'account_number' => 'required',               
                'transaction_password' => 'required',               
              
            ]);

            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
              $user=Auth::user();
              $password=$request->transaction_password;
            $avalable_balance=Auth::user()->users_incomes->sum('comm')-Auth::user()->withdraw->sum('amount');
            if ($avalable_balance>=$request->amount)
             {
              
              $bank_details=Bank::where('user_id',$user->id)->first();
              
      
              if(!empty($bank_details))
              {
              
              if (Hash::check($password, $user->tpassword))
               {   

                 $Amt=$request->amount-$request->amount*10/100;
              $net_amt=floor($Amt);
               $jsondata=Helper::withdrawal_request_api($user->phone,$bank_details,$net_amt);
    //   print_r($jsondata);die;
                 $rcstatus = $jsondata['status'];
                 $errormsg = $jsondata['error'];
                 if(empty($jsondata))
                 {
                   $rcstatus="PENDING";    
                 }          
               
               if($rcstatus=='ACCEPTED' || $rcstatus=='SUCCESS') 
              {
                  $txid = $jsondata['txid'];//jolo order id
                 $desc = $jsondata['desc'];
                 $status="Approved"; 

                   $data = [
                      
                        'txn_id' =>$txid,     
                        'user_id' => $user->id,
                        'user_id_fk' => $user->username,
                        'amount' => $request->amount,
                        'account' => $bank_details->account_no,
                        'payment_mode' => 'INR',
                        'status' => $status,
                        'wdate' => Date("Y-m-d"),
                    
                        
                    ];
                   $payment =  Withdraw::Create($data);
              
        return redirect()->route('withdraw-request')->with('messages', 'Withdraw Request Submited successfully');

      } else
                {
                return Redirect::back()->withErrors(array($errormsg));
                } 
               
              }
                else
                {
                return Redirect::back()->withErrors(array('Invalid Transaction Password'));
                }     
                
              }
              else
                {
                return Redirect::back()->withErrors(array('Please Update Your Trx Payment Address'));
                }     
                

             }
             else
             {
          return Redirect::back()->withErrors(array('Insufficient balance in Your account'));
             }




              }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            // print_r($e->getMessage());
            // die("hi");
            return  redirect()->route('withdraw-request')->withErrors('error', $e->getMessage())->withInput();
        }


    }
}
