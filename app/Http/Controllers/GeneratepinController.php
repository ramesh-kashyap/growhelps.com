<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Income;
use App\User;
use App\BuyFund;
use App\Pintransfer;
use App\WalletPin;
use App\GeneratePin;
use App\UsedPin;
use Validator;
use Hash;
use Carbon\Carbon;
use Log;
use Redirect;
use DB;
use Auth;
use Helper;


class GeneratepinController extends Controller
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
            $notes = GeneratePin::where('user_id',$user->id);      
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('user_id_fk', 'LIKE', '%' . $search . '%')          
              ->orWhere('pin', 'LIKE', '%' . $search . '%')
              ->orWhere('allocated_date', 'LIKE', '%' . $search . '%')
              ->orWhere('type', 'LIKE', '%' . $search . '%')
              ->orWhere('wallet', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

       return view('upnl.generate-pin')->with(['level_income'=>$notes])->with('search', $search);;
    }

 public function usedPin(Request $request)
    {

       $user=Auth::user();

          $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = UsedPin::where('owner',$user->username); 

           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('owner', 'LIKE', '%' . $search . '%')          
              ->orWhere('pin', 'LIKE', '%' . $search . '%')
              ->orWhere('pdate', 'LIKE', '%' . $search . '%')
              ->orWhere('type', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

       return view('upnl.usedPin')->with(['level_income'=>$notes])->with('search', $search);;
    }


 public function AvailablePin(Request $request)
    {

       $user=Auth::user();

          $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = WalletPin::select('*',DB::raw("COUNT(id) as pinvalue"))->where('user_id',$user->id)->groupBy('remarks')->groupBy('allocated_date'); 

           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('user_id_fk', 'LIKE', '%' . $search . '%')          
              ->orWhere('pin', 'LIKE', '%' . $search . '%')
              ->orWhere('allocated_date', 'LIKE', '%' . $search . '%')
              ->orWhere('remarks', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

       return view('upnl.AvailablePin')->with(['level_income'=>$notes])->with('search', $search);;
    }


public function transfer_pin(Request $request)
    {

       $user=Auth::user();

    
       $this->data['page'] = 'upnl/transfer-pin';
    return $this->dashboard_layout();
    }


  public function pin_transfer_submit(Request $request)
    {


      try{
            $validation =  Validator::make($request->all(), [
                'user_id' => 'required|exists:users,username',
                'pins' => 'required|numeric',
                'amount' => 'required',
               
              
            ]);

            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }

            
              $pins=$request->pins;
              $users=Auth::user();  
            
           $user=User::where('username',$request->user_id)->orderBy('id','desc')->first();
           $AvailablePin=WalletPin::where('user_id',$users->id)->limit($pins)->get();
         $wordCount = $AvailablePin->count();
            if ($wordCount==$pins)
             {
              foreach ($AvailablePin as $key => $value) 
              {               
                $remarks="Transferd to ". $user->username ."  by ".$users->username;
           
                $pintransfer = [
              'pin' => $value->pin,
              'to' => $request->user_id,
              'user_id' => $user->id,
              'from' => $users->username,
              'pin_type' => $request->amount,
              'remarks' => $remarks,
              'tdate' => Date("Y-m-d"),
          ];
          $payment =  Pintransfer::create($pintransfer);

            $walletPin = [
              'user_id' => $user->id,
              'user_id_fk' => $user->username,
              'allocated_date' => Date("Y-m-d"),
              'created_at' => Date("Y-m-d H:i:s"),
          ];
          WalletPin::where('pin',$value->pin)->update($walletPin);
              }
                return redirect()->route('transfer-pin')->with('messages', $pins.' Pins Transferd to '.$request->user_id );
        
             }
             else
             {
               return Redirect::back()->withErrors(array('Insufficient Pin Balance Error'));
             }          


                 

          }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
            die("hi");
            return  redirect()->route('transfer-pin')->withErrors('error', $e->getMessage())->withInput();
        }

    }

public function Pintransfered(Request $request)
    {

       $user=Auth::user();

          $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Pintransfer::select('*',DB::raw("COUNT(id) as pinvalue"))->where('to',$user->username)->orWhere('from',$user->username)->groupBy('remarks')->groupBy('tdate'); 

           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('user_id', 'LIKE', '%' . $search . '%')          
              ->orWhere('to', 'LIKE', '%' . $search . '%')
              ->orWhere('from', 'LIKE', '%' . $search . '%')
              ->orWhere('pin', 'LIKE', '%' . $search . '%')
              ->orWhere('tdate', 'LIKE', '%' . $search . '%')
              ->orWhere('remarks', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
          $this->data['level_income'] =$notes;
       $this->data['search'] =$search;
       $this->data['page'] = 'upnl/pintransfered';
         return $this->dashboard_layout();
    }



        public function SubmitGeneratPin(Request $request)
    {


      try{
            $validation =  Validator::make($request->all(), [
                // 'user_id' => 'required',
                'pins' => 'required|numeric',
                'type' => 'required',
                'wallet' => 'required|in:1,2',
               
               
              
            ]);

            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
            $user=Auth::user();
            
            
             if ($request->wallet==1)
              {
               $balance=Auth::user()->Fund_wallet->sum('amount')-Auth::user()->GeneratePinAmt->sum('type');
              }
              else
              {
              $balance=Auth::user()->available_balance();
              }


             $pinamt =$request->type+$request->type*10/100*$request->pins;     
           
               if ($balance>=$pinamt)
               {

               	  $ptype="S";
               	  if ($request->type=="500")
               	   {
               	  	$ptype="S";
                    }
                  if ($request->type=="1000")
               	   {
               	  	$ptype="B";
                    }

                  if ($request->type=="5000")
               	   {
               	  	$ptype="A";
                   }

                  if ($request->type=="10000")
               	   {
               	  	$ptype="P";
                   }

                   if ($request->type=="25000")
               	   {
               	  	$ptype="E";
                   }
                   if ($request->type=="50000")
               	   {
               	  	$ptype="SP";
                   }



                  for ($i=0; $i <$request->pins; $i++) 
                  {
                  $pin =$ptype.substr(rand(),-4).substr(time(),-3).substr(mt_rand(),-4);

                    $pindata=array(
				      'pin'=>$pin,
				      'user_id'=>$user->id,
				      'user_id_fk'=>$user->username,
				      'allocated_date'=>Date("Y-m-d"),
				      'remarks'=>$request->type,
				      'wallet'=>$request->wallet,
				      'type'=>$request->type+$request->type*10/100,

				      );

                    $payment =  GeneratePin::create($pindata);

				 					  
				      $pindat=array(
				      'pin'=>$pin,
				      'user_id'=>$user->id,
				      'user_id_fk'=>$user->username,
				      'allocated_date'=>Date("Y-m-d"),
				      'remarks'=>$request->type,

				      );
                    $payment =  WalletPin::create($pindat);
                  }

               return redirect()->route('Generate-pin')->with('messages', $request->pins. ' Pins Generate successfully');
                
               }
               else
              {

              return Redirect::back()->withErrors(array('Insufficient Balance Error'));
               }
                 

          }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
            die("hi");
            return  redirect()->route('Generate-pin')->withErrors('error', $e->getMessage())->withInput();
        }

    }



}
