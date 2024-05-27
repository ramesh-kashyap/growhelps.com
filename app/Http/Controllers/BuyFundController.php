<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Income;
use App\User;
use App\BuyFund;
use Validator;
use Hash;
use Carbon\Carbon;
use Log;
use Redirect;
use DB;
use Auth;
use Helper;


class BuyFundController extends Controller
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
            $notes = BuyFund::where('user_id',$user->id);      
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('user_id_fk', 'LIKE', '%' . $search . '%')          
              ->orWhere('txn_no', 'LIKE', '%' . $search . '%')
              ->orWhere('status', 'LIKE', '%' . $search . '%')
              ->orWhere('type', 'LIKE', '%' . $search . '%')
              ->orWhere('amount', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

       return view('upnl.buy-fund')->with(['level_income'=>$notes])->with('search', $search);;
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
            
                $invest_check=BuyFund::where('user_id',$user->id)->where('status','Pending')->orderBy('id','desc')->first();
                  $invoice = substr(str_shuffle("0123456789"), 0, 7);
              if (!empty($invest_check))
               {
                
                 return Redirect::back()->withErrors(array('Request already Pending Error'));
              }
              else
              {

              $amt=$request->amount;
              $type=$request->type;


		        $data['coin']=$type;
		        $data['d_amt']=$amt;
			        
			     $request = [
			    'amount' => $amt,
			    'currency1' => 'USD',
			    'currency2' => $type,
			    'buyer_email' => 'trxdvcvikram@gmail.com',
			    'item' => "Donate to trxtrendz2021",
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
            // print_r($e->getMessage());
            // die("hi");
            return  redirect()->route('Buy-Funds')->withErrors('error', $e->getMessage())->withInput();
        }

    }




    public function CompletePayment(Request $request)
    {
      try
      {	
           $user=Auth::user();

                   $data = [
                     
                        'txn_no' =>$request->txn_no,
                        'user_id' => $user->id,
                        'user_id_fk' => $user->username,
                        'amount' => $request->amount,
                        'type' => 'TRX',
                        'bdate' => Date("Y-m-d"),
                        
                    ];
                   $payment =  BuyFund::create($data);
              
        return redirect()->route('Buy-Funds')->with('messages', 'Fund Request Submited successfully');


       }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            // print_r($e->getMessage());
            // die("hi");
            return  redirect()->route('Buy-Funds')->withErrors('error', $e->getMessage())->withInput();
        }

    }

}
