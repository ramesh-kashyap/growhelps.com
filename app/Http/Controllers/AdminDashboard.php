<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Income;
use App\Investment;
use App\Bank;
use App\Withdraw;
use App\GeneratePin;
use App\Pintransfer;
use App\Ticket;
use App\WalletPin;
use App\AddTaskUrl;
use App\BuyFund;
use App\UsedPin;
use App\AddTaskLimit;
use App\Task;
use App\Payout;
use App\Club_b;
use App\Club_c;
use App\Club_d;
use App\Club_e;
use App\Club_f;
use App\Club_a;
use Auth;
use DB;
use Log;
use Validator;
use Redirect;
use Helper;
use Carbon\Carbon;
class AdminDashboard extends Controller
{
 
     public function index()
    {     
     
     return view('admin.dashboard_view');
     
    } 
   public function activate_user_view()
    {     

     return view('admin.activate_user_view');
     
    } 

   public function add_taskUrl()
    {     

     return view('admin.add_taskUrl');
     
    } 
  public function change_admin_password()
    {     

     return view('admin.change-admin-password');
     
    } 

     public function pin_tranfers()
    {     

     return view('admin.pin-tranfer');
     
    } 

     public function activeusers(Request $request)
    {     

        $limit = $request->limit ? $request->limit : 10;
        $status = $request->status ? $request->status : null;
        $search = $request->search ? $request->search : null;
        $start_date = $request->start_date ? $request->start_date : null;
        $end_date = $request->end_date ? $request->end_date : null;
        $notes = User::where('active_status','Active')->orderBy('id', 'DESC');
             
       if($search <> null || $start_date<>null && $end_date<>null && $request->reset!="Reset"){

        $notes = User::where(function($q) use($search,$start_date,$end_date){

          if($start_date <> null && $end_date<> null)
          {
            $originalDate =$start_date ;
            $startnewDate = date("Y-m-d", strtotime($originalDate));
            $endoriginalDate =$end_date ;
            $endoriginalDate = date("Y-m-d", strtotime($endoriginalDate));
            $q->orWhereBetween('jdate', [$startnewDate, $endoriginalDate]);
          }
          else
          {
           $q->Where('name', 'LIKE', '%' . $search . '%')          
          ->orWhere('username', 'LIKE', '%' . $search . '%')
          ->orWhere('email', 'LIKE', '%' . $search . '%')
          ->orWhere('phone', 'LIKE', '%' . $search . '%')
          ->orWhere('jdate', 'LIKE', '%' . $search . '%')
          ->orWhere('active_status', 'LIKE', '%' . $search . '%');
          }
          
        });
    
      }
      
       $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

     return view('admin.active_user')->with(['active_user'=>$notes])->with('search', $search)->with('start_date', $start_date)->with('end_date', $end_date);
    } 



     public function block_users(Request $request)
    {     

       $limit = $request->limit ? $request->limit : 10;
        $status = $request->status ? $request->status : null;
        $search = $request->search ? $request->search : null;
        $notes = User::wherein('active_status',array('Active','Block','Inactive'))->orderBy('id', 'DESC');
            
       if($search <> null && $request->reset!="Reset"){
        $notes = $notes->where(function($q) use($search){
          $q->Where('name', 'LIKE', '%' . $search . '%')          
          ->orWhere('username', 'LIKE', '%' . $search . '%')
          ->orWhere('email', 'LIKE', '%' . $search . '%')
          ->orWhere('phone', 'LIKE', '%' . $search . '%')
          ->orWhere('jdate', 'LIKE', '%' . $search . '%')
          ->orWhere('active_status', 'LIKE', '%' . $search . '%');
        });
    
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

     return view('admin.block_user')->with(['active_user'=>$notes])->with('search', $search);
    }  
       public function alluserlist(Request $request)
    {     

       $limit = $request->limit ? $request->limit : 10;
        $status = $request->status ? $request->status : null;
        $search = $request->search ? $request->search : null;
       
        $notes = User::orderBy('id', 'DESC')->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
            
       if($search <> null && $request->reset!="Reset"){
        $notes = User::where(function($q) use($search){
          $q->Where('name', 'LIKE', '%' . $search . '%')          
          ->orWhere('username', 'LIKE', '%' . $search . '%')
          ->orWhere('email', 'LIKE', '%' . $search . '%')
          ->orWhere('phone', 'LIKE', '%' . $search . '%')
          ->orWhere('jdate', 'LIKE', '%' . $search . '%')
          ->orWhere('active_status', 'LIKE', '%' . $search . '%');
        })->orderBy('id', 'DESC')->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
    
      }
    //   dd($notes);
     return view('admin.alluserlist')->with(['active_user'=>$notes])->with('search', $search);
    }  

        public function edit_users(Request $request)
    {     

       $limit = $request->limit ? $request->limit : 10;
        $status = $request->status ? $request->status : null;
        $search = $request->search ? $request->search : null;
       
        $notes = User::orderBy('id', 'DESC')->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
            
       if($search <> null && $request->reset!="Reset"){
        $notes = User::where(function($q) use($search){
          $q->Where('name', 'LIKE', '%' . $search . '%')          
          ->orWhere('username', 'LIKE', '%' . $search . '%')
          ->orWhere('email', 'LIKE', '%' . $search . '%')
          ->orWhere('phone', 'LIKE', '%' . $search . '%')
          ->orWhere('jdate', 'LIKE', '%' . $search . '%')
          ->orWhere('active_status', 'LIKE', '%' . $search . '%');
        })->orderBy('id', 'DESC')->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
    
      }

     return view('admin.edit_users')->with(['active_user'=>$notes])->with('search', $search);
    }  
    
   public function deposit_request(Request $request)
    {     

       $limit = $request->limit ? $request->limit : 10;
        $status = $request->status ? $request->status : null;
        $search = $request->search ? $request->search : null;
        $notes = Investment::where('status','Pending')->orderBy('id', 'DESC');
            
       if($search <> null && $request->reset!="Reset"){
        $notes = $notes->where(function($q) use($search){
          $q->Where('amount', 'LIKE', '%' . $search . '%')          
          ->orWhere('user_id_fk', 'LIKE', '%' . $search . '%')
          ->orWhere('sdate', 'LIKE', '%' . $search . '%')
          ->orWhere('status', 'LIKE', '%' . $search . '%')
          ->orWhere('transaction_id', 'LIKE', '%' . $search . '%');
          
        });
    
      }
            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

     return view('admin.deposit-request')->with(['deposit_list'=>$notes])->with('search', $search);
    }  
   public function task_request(Request $request)
    {     

       $limit = $request->limit ? $request->limit : 10;
        $status = $request->status ? $request->status : null;
        $search = $request->search ? $request->search : null;
        $notes = Task::where('status','Pending');
            
       if($search <> null && $request->reset!="Reset"){
        $notes = $notes->where(function($q) use($search){
          $q->Where('url', 'LIKE', '%' . $search . '%')          
          ->orWhere('user_id_fk', 'LIKE', '%' . $search . '%')
          ->orWhere('tdate', 'LIKE', '%' . $search . '%')
          ->orWhere('status', 'LIKE', '%' . $search . '%');
          
        });
    
      }
            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

     return view('admin.task-request')->with(['deposit_list'=>$notes])->with('search', $search);
    }  

   public function task_report(Request $request)
    {     

       $limit = $request->limit ? $request->limit : 10;
        $status = $request->status ? $request->status : null;
        $search = $request->search ? $request->search : null;
        $notes = Task::whereIn('status',['Approved','Reject']);
            
       if($search <> null && $request->reset!="Reset"){
        $notes = $notes->where(function($q) use($search){
          $q->Where('url', 'LIKE', '%' . $search . '%')          
          ->orWhere('user_id_fk', 'LIKE', '%' . $search . '%')
          ->orWhere('tdate', 'LIKE', '%' . $search . '%')
          ->orWhere('status', 'LIKE', '%' . $search . '%')
          ->orWhere('approved_date', 'LIKE', '%' . $search . '%');
          
        });
    
      }
            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

     return view('admin.task-report')->with(['deposit_list'=>$notes])->with('search', $search);
    }  

  
   public function deposit_list(Request $request)
    {     

       $limit = $request->limit ? $request->limit : 10;
        $status = $request->status ? $request->status : null;
        $search = $request->search ? $request->search : null;
        $start_date = $request->start_date ? $request->start_date : null;
        $end_date = $request->end_date ? $request->end_date : null;
        $notes = Investment::paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
             
       if($search <> null || $start_date<>null && $end_date<>null && $request->reset!="Reset"){

        $notes = Investment::where(function($q) use($search,$start_date,$end_date){

          if($start_date <> null && $end_date<> null)
          {
            $originalDate =$start_date ;
            $startnewDate = date("Y-m-d", strtotime($originalDate));
            $endoriginalDate =$end_date ;
            $endoriginalDate = date("Y-m-d", strtotime($endoriginalDate));
            $q->orWhereBetween('sdate', [$startnewDate, $endoriginalDate]);
          }
          else
          {
          $q->Where('amount', 'LIKE', '%' . $search . '%')          
          ->orWhere('user_id_fk', 'LIKE', '%' . $search . '%')
          ->orWhere('sdate', 'LIKE', '%' . $search . '%')
          ->orWhere('status', 'LIKE', '%' . $search . '%')

          ->orWhere('transaction_id', 'LIKE', '%' . $search . '%');
          }
          
        })->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
    
      }
            

     return view('admin.deposit_list')->with(['deposit_list'=>$notes])->with('search', $search)->with('start_date', $start_date)->with('end_date', $end_date);
    }  

  public function usersLevel_bonus(Request $request)
    {     

      
           $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Income::where('remarks','Performance Bonus')->orderBy('id', 'DESC');      
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('rname', 'LIKE', '%' . $search . '%')          
              ->orWhere('ttime', 'LIKE', '%' . $search . '%')
              ->orWhere('user_id_fk', 'LIKE', '%' . $search . '%')
              ->orWhere('level', 'LIKE', '%' . $search . '%')
              ->orWhere('amt', 'LIKE', '%' . $search . '%')
              ->orWhere('comm', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);


     return view('admin.level_incomes')->with(['level_incomes'=>$notes])->with('search', $search);
    }  

  public function direct_referal_bonus(Request $request)
    {     

      
           $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Income::where('remarks','Level Bonus')->orderBy('id', 'DESC');      
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('remarks', 'LIKE', '%' . $search . '%')          
              ->orWhere('ttime', 'LIKE', '%' . $search . '%')
              ->orWhere('user_id_fk', 'LIKE', '%' . $search . '%')
              ->orWhere('level', 'LIKE', '%' . $search . '%')
              ->orWhere('amt', 'LIKE', '%' . $search . '%')
              ->orWhere('comm', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);


     return view('admin.direct_referal_bonus')->with(['level_incomes'=>$notes])->with('search', $search);
    }  



  public function usersRoi_bonus(Request $request)
    {     

      
           $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Income::where('remarks','C.T.O Bonus')->orderBy('id', 'DESC');      
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('comm', 'LIKE', '%' . $search . '%')          
              ->orWhere('amt', 'LIKE', '%' . $search . '%')
              ->orWhere('user_id_fk', 'LIKE', '%' . $search . '%')
              
              ->orWhere('ttime', 'LIKE', '%' . $search . '%');
            });
        
      }
            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
     return view('admin.roi_incomes')->with(['direct_incomes'=>$notes])->with('search', $search);
    }  

  public function globalComminuty_bonus(Request $request)
    {     

      
           $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Income::where('remarks','Royal Magic Bonus')->orderBy('id', 'DESC');      
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('comm', 'LIKE', '%' . $search . '%')          
              ->orWhere('amt', 'LIKE', '%' . $search . '%')
              ->orWhere('user_id_fk', 'LIKE', '%' . $search . '%')
              
              ->orWhere('ttime', 'LIKE', '%' . $search . '%');
            });
        
      }
            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
     return view('admin.globalComminuty_bonus')->with(['direct_incomes'=>$notes])->with('search', $search);
    }  

 

  public function add_fund_report(Request $request)
    {     

      
           $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;  

            $notes = BuyFund::paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);


           if($search <> null && $request->reset!="Reset"){
            $notes = BuyFund::where(function($q) use($search){
              $q->Where('txn_no', 'LIKE', '%' . $search . '%')          
              ->orWhere('bdate', 'LIKE', '%' . $search . '%')
              ->orWhere('user_id_fk', 'LIKE', '%' . $search . '%')
              ->orWhere('status', 'LIKE', '%' . $search . '%')
              
              ->orWhere('type', 'LIKE', '%' . $search . '%');
            })->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
        
      }
          
     return view('admin.add_fund_report')->with(['direct_incomes'=>$notes])->with('search', $search);
    }  
    
   
  public function payment_ledger(Request $request)
    {     

     
        $limit = $request->limit ? $request->limit : 10;
        $status = $request->status ? $request->status : null;
        $search = $request->search ? $request->search : null;
        $start_date = $request->start_date ? $request->start_date : null;
        $end_date = $request->end_date ? $request->end_date : null;
        $notes = Payout::orderBy('id', 'DESC')->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
             
       if($search <> null || $start_date<>null && $end_date<>null && $request->reset!="Reset"){

        $notes = Payout::where(function($q) use($search,$start_date,$end_date){

          if($start_date <> null && $end_date<> null)
          {
            $originalDate =$start_date ;
            $startnewDate = date("Y-m-d", strtotime($originalDate));
            $endoriginalDate =$end_date ;
            $endoriginalDate = date("Y-m-d", strtotime($endoriginalDate));
            $q->orWhereBetween('ttime', [$startnewDate, $endoriginalDate]);
          }
          else
          {
          $q->Where('user_id_fk', 'LIKE', '%' . $search . '%')          
              ->orWhere('distributor_bonus', 'LIKE', '%' . $search . '%')
              ->orWhere('performance_bonus', 'LIKE', '%' . $search . '%')
              ->orWhere('ttime', 'LIKE', '%' . $search . '%')              
              ->orWhere('withdraw_amt', 'LIKE', '%' . $search . '%');
          }
          
        })->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
    
      }
            //   echo "<pre>";
            // print_r($notes);die;

     return view('admin.payment_ledger')->with(['direct_incomes'=>$notes])->with('search', $search)->with('start_date', $start_date)->with('end_date', $end_date);
     
    }  
    
    
  public function support_query(Request $request)
    {     

      
           $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;  

          
            $notes = Ticket::where('status',0)->groupBy('ticket_no');


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
          
     return view('admin.support_query')->with(['level_incomes'=>$notes])->with('search', $search);
    }  


 public function get_support_msg(Request $request)
    {

    

                $id= $request->ticket_no ; // or any params
       
        $profile = Ticket::where('ticket_no',$id)->get();
       return view('admin.get_support_msg')->with(['open_ticket_msg'=>$profile]);
    }

public function close_ticket_(Request $request)
    {

    

                $id= $request->ticket_no ; // or any params
         
        $profile = Ticket::where('ticket_no',$id)->update(array('status'=>1,'closing_date'=>date("Y-m-d H:i:s")));
      return redirect()->route('support-query')->with('messages', 'Close Ticket successfully');
    }


public function reply_support_msg(Request $request)
    {

    

                $id= $request->ticket_no ; // or any params
       
        // $profile = Ticket::where('ticket_no',$id)->first();
       return view('admin.reply_support_msg')->with(['open_ticket_msg'=>$id]);
    }



    
        public function admin_ticket_submit(Request $request)
    {


      try{
            $validation =  Validator::make($request->all(), [
                // 'user_id' => 'required',
                'ticket_no' => 'required',
                'message' => 'required',
               
               
              
            ]);

            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
          
            $ticket_no=$request->ticket_no;
            $message=$request->message;

             $check_tacket =Ticket::where('ticket_no',$ticket_no)->first();
       
             if(!empty($check_tacket))  
             {
              
               $data_to_insert = array(
                              'user_id_fk' => $check_tacket->user_id_fk, 
                              'user_id' => $check_tacket->user_id, 
                              'category'   => $check_tacket->category, 
                              'msg'        => $message, 
                              'gen_date'   => date('Y-m-d'), 
                              'closing_date' => NULL, 
                              'ticket_no' => $ticket_no, 
                             
                              'status'       => false,
                              'reply_by'     => 'admin'
                            );
             
                  $payment =  Ticket::create($data_to_insert);
                  
                  
              
        return redirect()->route('support-query')->with('messages', 'Generate Ticket successfully');

             }
             else
             {
                  return redirect()->route('support-query')->withErrors(array('Ticket does not exist'));
             }

          }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
            die("hi");
            return  redirect()->route('support-query')->withErrors('error', $e->getMessage())->withInput();
        }

    }
     
        public function AddTask(Request $request)
    {


      try{
            $validation =  Validator::make($request->all(), [
                // 'user_id' => 'required',
                'url' => 'required',
              
               
              
            ]);

            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
          
          
              
               $data_to_insert = array(
                              'url' => $request->url,
                              'tdate'   => date('Y-m-d'), 
                            
                            );
             
                  $payment =  AddTaskUrl::create($data_to_insert);
                  
                  
              
        return redirect()->route('Add-TaskUrl')->with('message', 'Task URL Added successfully');

          

          }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
            die("hi");
            return  redirect()->route('Add-TaskUrl')->withErrors('error', $e->getMessage())->withInput();
        }

    }
    
  public function AddLimit(Request $request)
    {


      try{
            $validation =  Validator::make($request->all(), [
                // 'user_id' => 'required',
                'limit' => 'required',
              
               
              
            ]);

            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }

           $user_update=array('limit'=>$request->limit,'tdate'=>Date("Y-m-d"));
            AddTaskLimit::where('id',2)->update($user_update);
          
                  
              
        return redirect()->route('Add-TaskUrl')->with('messages', 'Task Limit Added successfully');

          

          }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            // print_r($e->getMessage());
            // die("hi");
            return  redirect()->route('Add-TaskUrl')->withErrors('error', $e->getMessage())->withInput();
        }

    }
    

        public function pin_transfer_submit(Request $request)
    {


      try{
            $validation =  Validator::make($request->all(), [
                'user_id' => 'required|exists:users,username',
                'pins' => 'required',
                'amount' => 'required',
               
              
            ]);

            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
            
           $user=User::where('username',$request->user_id)->orderBy('id','desc')->first();
           $pins=$request->pins;
            for ($i=0; $i < $pins; $i++) 
            { 
             $remarks="Transferd to ". $user->username ."  by Admin";
            $var = rand(1111111111,9999999999);
            $pin = "GL".$var;
                $pintransfer = [
              'pin' => $pin,
              'to' => $request->user_id,
              'user_id' => $user->id,
              'from' => 'Admin',
              'pin_type' => $request->amount,
              'payment_mode' => 'INR',
              'remarks' => $remarks,
              'tdate' => Date("Y-m-d"),
          ];
          $payment =  Pintransfer::create($pintransfer);
                $walletPin = [
              'pin' => $pin,
              'user_id_fk' => $request->user_id,
              'user_id' => $user->id,
              'remarks' => $request->amount,
              'allocated_date' => Date("Y-m-d"),
          ];
          $payment =  WalletPin::create($walletPin);

            }               

              
        return redirect()->route('pin_tranfers')->with('message', $pins.' Pins Transferd to '.$request->user_id );
              
                 

          }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            // print_r($e->getMessage());
            // die("hi");
            return  redirect()->route('pin_tranfers')->withErrors('error', $e->getMessage())->withInput();
        }

    }


  public function tranferPin_report(Request $request)
    {     

      
           $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;  

            $notes = Pintransfer::select('*',DB::raw("COUNT(id) as pinvalue"))->groupBy('remarks')->groupBy('tdate')->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);


         if($search <> null && $request->reset!="Reset"){
            $notes = Pintransfer::select('*',DB::raw("COUNT(id) as pinvalue"))->where(function($q) use($search){
              $q->Where('pin', 'LIKE', '%' . $search . '%')          
              ->orWhere('tdate', 'LIKE', '%' . $search . '%')
              ->orWhere('to', 'LIKE', '%' . $search . '%')           
              ->orWhere('from', 'LIKE', '%' . $search . '%')           
              ->orWhere('pin_type', 'LIKE', '%' . $search . '%')
              ->orWhere('remarks', 'LIKE', '%' . $search . '%');
            })->groupBy('remarks')->groupBy('tdate')->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
        
      }

      // print_r($notes);die();
          
     return view('admin.tranferPin_report')->with(['direct_incomes'=>$notes])->with('search', $search);
    }  



  public function generatePin_report(Request $request)
    {     

      
           $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;  

            $notes = GeneratePin::select('*',DB::raw("COUNT(id) as pinvalue"))->groupBy('remarks')->groupBy('allocated_date')->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);


         if($search <> null && $request->reset!="Reset"){
            $notes = GeneratePin::select('*',DB::raw("COUNT(id) as pinvalue"))->where(function($q) use($search){
              $q->Where('pin', 'LIKE', '%' . $search . '%')          
              ->orWhere('allocated_date', 'LIKE', '%' . $search . '%')
              ->orWhere('user_id_fk', 'LIKE', '%' . $search . '%')           
              ->orWhere('type', 'LIKE', '%' . $search . '%')
              ->orWhere('wallet', 'LIKE', '%' . $search . '%')
              ->orWhere('remarks', 'LIKE', '%' . $search . '%');
            })->groupBy('remarks')->groupBy('allocated_date')->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
        
      }
          
     return view('admin.generatePin_report')->with(['direct_incomes'=>$notes])->with('search', $search);
    }  
  public function available_pin_report(Request $request)
    {     

      
           $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;  

            $notes = WalletPin::select('*',DB::raw("COUNT(id) as pinvalue"))->groupBy('remarks')->groupBy('allocated_date')->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);


         if($search <> null && $request->reset!="Reset"){
            $notes = WalletPin::select('*',DB::raw("COUNT(id) as pinvalue"))->where(function($q) use($search){
              $q->Where('pin', 'LIKE', '%' . $search . '%')          
              ->orWhere('allocated_date', 'LIKE', '%' . $search . '%')
              ->orWhere('user_id_fk', 'LIKE', '%' . $search . '%')
              ->orWhere('remarks', 'LIKE', '%' . $search . '%');
            })->groupBy('remarks')->groupBy('allocated_date')->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
        
      }
          
     return view('admin.available_pin_report')->with(['direct_incomes'=>$notes])->with('search', $search);
    }  

 public function used_pin_report(Request $request)
    {     

      
           $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;  

            $notes = UsedPin::paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);


         if($search <> null && $request->reset!="Reset"){
            $notes = UsedPin::where(function($q) use($search){
              $q->Where('pin', 'LIKE', '%' . $search . '%')          
              ->orWhere('pdate', 'LIKE', '%' . $search . '%')
              ->orWhere('owner', 'LIKE', '%' . $search . '%')           
              ->orWhere('user', 'LIKE', '%' . $search . '%')           
              ->orWhere('type', 'LIKE', '%' . $search . '%')
              ->orWhere('remarks', 'LIKE', '%' . $search . '%');
            })->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
        
      }
          
     return view('admin.used_pin_report')->with(['direct_incomes'=>$notes])->with('search', $search);
    }  



  public function withdraw_request_user(Request $request)
    {     

         
           $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Withdraw::where('status','Pending');      
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('user_id_fk', 'LIKE', '%' . $search . '%')          
              ->orWhere('amount', 'LIKE', '%' . $search . '%')
              ->orWhere('user_id_fk', 'LIKE', '%' . $search . '%')
              ->orWhere('txn_id', 'LIKE', '%' . $search . '%')         
              ->orWhere('wdate', 'LIKE', '%' . $search . '%');
            });
        
      }
            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

                
          
     return view('admin.withdraw_request_user')->with(['withdraw_request_user'=>$notes])->with('search', $search);
    }  

 public function withdraw_history_user(Request $request)
    {     

   
           $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Withdraw::paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('user_id_fk', 'LIKE', '%' . $search . '%')          
              ->orWhere('amount', 'LIKE', '%' . $search . '%')
              ->orWhere('user_id_fk', 'LIKE', '%' . $search . '%')
              ->orWhere('status', 'LIKE', '%' . $search . '%')         
              ->orWhere('txn_id', 'LIKE', '%' . $search . '%')         
              ->orWhere('wdate', 'LIKE', '%' . $search . '%');
            })->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
        
      }
     return view('admin.withdraw_history_user')->with(['withdraw_request_user'=>$notes])->with('search', $search);
    }  



    public function activate_admin_post(Request $request)
    {


      try{
            $validation =  Validator::make($request->all(), [
                'user_id' => 'required',
                'amount' => 'required',
               
              
            ]);

            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
            
              

                $user=User::where('username',$request->user_id)->orderBy('id','desc')->first();
               
                  $invoice = substr(str_shuffle("0123456789"), 0, 7);

                  $invest_check=Investment::where('user_id',$user->id)->where('status','!=','Decline')->orderBy('id','desc')->limit(1)->first();
                  $invoice = substr(str_shuffle("0123456789"), 0, 7);


                   if(!empty($invest_check))
                     {
                      $check_ex=($invest_check->amount)?$invest_check->amount:0;
                     }
                     else
                     {
                         $check_ex=0;
                     }

                     // print($check_ex);die();
                     if ($request->amount>=$check_ex) 
                     {
                     $candition=true;
                     }
                     else
                     {
                     $candition=false;
                     }

              if ($candition)
               {
              
              	   $data = [
                        'plan' => $invoice,
                        'transaction_id' => $invoice,
                        'user_id' => $user->id,
                        'user_id_fk' => $user->username,
                        'amount' => $request->amount,
                        'payment_mode' => 'INR',
                        'status' => 'Active',
                        'sdate' => Date("Y-m-d"),
                        'active_from' => $user->username,
                        
                    ];
                  
                     $users = User::where('id',$user->id)->first();
                  if ($users->active_status=="Pending")
                   {
                    $user_update=array('active_status'=>'Active','adate'=>Date("Y-m-d H:i:s"),'package'=>$request->amount);
                  User::where('id',$user->id)->update($user_update);
                  }
                    Helper::add_direct_income($user->id,$request->amount);
                   $payment =  Investment::create($data);
              
        return redirect()->route('activate-user')->with('message', 'User Activation successfully');
              }
              else
              {
                   return Redirect::back()->withErrors(array('Please choose above package of '.$request->amount));
              }
                 

          }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
            die("hi");
            return  redirect()->route('activate-user')->withErrors('error', $e->getMessage())->withInput();
              }
        

    }

  
    public function add_user_club(Request $request)
    {


      try{
            $validation =  Validator::make($request->all(), [
                'user_id' => 'required|exists:users,username',
                'club' => 'required',
               
              
            ]);

            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
                
              

                $user=User::where('username',$request->user_id)->orderBy('id','desc')->first();
               
                  $invoice = substr(str_shuffle("0123456789"), 0, 7);

                 
               $club_check = \DB::table($request->club)->where('user_id',$user->id)->first();


              if (empty($club_check) && !empty($request->club))
               {
              
                  $wordlist = \DB::table($request->club)->orderBy('id','asc')->limit(1)->first();
                  $first_id=(!empty($wordlist)?$wordlist->user_id:0);
                  $Report=$this->getNodeInsertPostionByParentId_bronze(array($first_id),$request->club);
                $pos =$Report['node'];
                if($pos=="1")
                {
                    $pos = "Left";
                }
               elseif($pos=="2")
                {
                    $pos = "Middle";
                }
                else{
                    $pos = "Right";
                }
                $sponsor = $Report['parentId'];
               $userLevel = \DB::table($request->club)->where('user_id',$sponsor)->first();               
                $mxLevel= (!empty($userLevel)?$userLevel->level+1:0);
 
 
                   $data = [
                        'ParentId' =>$sponsor,
                        'level' => $mxLevel,
                        'user_id' => $user->id,
                        'username' => $user->username,
                        'name' => $user->name,
                        'position' => $pos,
                        'added_by' => 'Admin',
                        'round' => 1,
                        
                    ];
                   DB::table($request->club)->insert($data);
              
          return redirect()->route('activate-user')->with('message', $user->username.' User Added successfully');
              }
              else
              {
                   return Redirect::back()->withErrors(array($request->user_id.' Already Achieved this Club'));
              }
                 

          }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
            die("hi");
            return  redirect()->route('activate-user')->withErrors('error', $e->getMessage())->withInput();
              }
        

    }

   function getNodeInsertPostionByParentId_bronze($parentId,$table){
    

          if ($parentId!=0)
           {
            # code...
        
        $position = array('status'=>false);
        $parents = array();
         // print_r($parentId);die()
        foreach($parentId as $parent){  

                $q2= DB::table($table)->select("*")->where('ParentId',$parent)->orderBy('position');
                $count = $q2->count();
                  
            //echo $count."<br>";
             $myinfo = $q2->get();
           //echo '<pre>'; print_r($myinfo); die('down user list');
                 if($count >= 3){
                    foreach($myinfo as $row) {

                       $query= DB::table($table)->select("".$table.".user_id",
                    DB::raw("(SELECT COUNT(".$table.".id) FROM ".$table."
                                WHERE ".$table.".ParentId = ".$table.".user_id) as cnt"))->orderBy('id','asc');
                    //   print_r($query->result_array())."<pre>";die;
                        foreach ($query->get() as $key => $value)
                         {
                          $user_id=$value->user_id;
                          $count=$value->cnt;
                          if ($count<3) {
                              
                        @$parents[@$parent][] = $user_id;
                       
                          }
                        }
                       
                      
                    //   print_r($parents);die();

                    }
                }
                elseif($count==1){
                    $position['status'] = true;
                    $position['parentId'] = $parent;
                    $position['node'] = '2';
                    //echo '<pre>1';print_r($position);echo '</pre>';
                    return $position;
                }
                elseif($count==2){
                    $position['status'] = true;
                    $position['parentId'] = $parent;
                    $position['node'] = '3';
                    //echo '<pre>1';print_r($position);echo '</pre>';
                    return $position;
                }
                else{
                    $position['status'] = true;
                    $position['parentId'] = $parent;
                    $position['node'] = '1';
                    //echo '<pre>2';print_r($position);echo '</pre>';
                   return $position;
                }
            }

        return $this->searchByParentsbronze($parents,$table);
      }
      else
      {
        $position['parentId'] =0;
        $position['node'] = '1';
        return $position;
      }
      
    }

    function searchByParentsbronze($parents,$table){
        //   echo '<pre>'; print_r($parents); die('down user list');

            foreach($parents as $parent){
                return $this->getNodeInsertPostionByParentId_bronze($parent,$table);  
            }
        }


        public function users_profile_update(Request $request)

    {
        try{
            $validation =  Validator::make($request->all(), [
                'email' => 'required',
                'name' => 'required',
                // 'trx_addres' => 'required',
                'phone' => 'required|numeric'
              
            ]);

            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }

           
            //check if email exist
          $post_array  = $request->all();
            $id=$post_array['id'];
          $update_data['name']=$post_array['name'];
          $update_data['phone']=$post_array['phone'];
          if(!empty($post_array['password']))
          {
            $update_data['password']= \Hash::make($post_array['password']); 
          }
        //   $update_data['trx_addres']=$post_array['trx_addres'];
          $update_data['email']=$post_array['email'];
           $bank_array['account_holder']=$post_array['account_holder'];
           $bank_array['bank_name']=$post_array['bank_name'];
           $bank_array['branch_name']=$post_array['branch_name'];
           $bank_array['account_no']=$post_array['account_no'];
           $bank_array['user_id']=$id;
           $bank_array['ifsc_code']=$post_array['ifsc_code'];
          
          $user =  user::where('id',$id)->update($update_data);
            Bank::updateOrCreate(['user_id'=>$id],$bank_array);
        return redirect()->back()->with('message', 'Updated successfully');

          }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            // print_r($e->getMessage());
            // die("hi");
            return back()->withErrors('error', $e->getMessage())->withInput();
            //return response(array('success'=>0,'statuscode'=>500,'msg'=>$e->getMessage()),500);
        }
    }


     public function edit_users_link(Request $request)
     {

        $id= $request->id ; // or any params
       
     $profile = User::where('id',$id)->first();
      $bank = Bank::where('user_id',$id)->first();
     // print_r($data);die(); ÷ 
     return view('admin.users_profile_view')->with(compact('profile','bank'));

    }

    
     public function withdraw_request_done(Request $request)
     {

        $id= $request->id ; // or any params
        $withdraw_status= $request->withdraw_status ; // or any params
         $withdraw_id = Withdraw::where('id',$id)->first();
        $randomId       =   "TXN".rand(999999999999999,2);
      if ($withdraw_status=="success")
       {
        
       $update_data['status']= 'Approved'; 
       $update_data['txn_id']=$randomId; 
       $update_data['paid_date']= Carbon::now(); 
       $user =  Withdraw::where('id',$id)->update($update_data); 

      return redirect()->back()->with('message', 'Withdraw request Approved successfully');
       }
       else
       {
          $update_data['status']= 'Failed'; 
       $user =  Withdraw::where('id',$id)->update($update_data); 
       return redirect()->back()->with('message', 'Withdraw request Rejected successfully');
       }
    
    
      

    }

     
     public function deposit_request_done(Request $request)
     {

        $id= $request->id ; // or any params
        $user_id= $request->user_Id ; // or any params
        $withdraw_status= $request->withdraw_status ; // or any params
         $user = Investment::where('id',$id)->first();

      if ($withdraw_status=="success")
       {
        
           $update_data['status']= 'Active'; 
            Investment::where('id',$id)->update($update_data); 
            $users = User::where('id',$user_id)->first();
          if ($users->active_status=="Pending")
           {
            $user_update=array('active_status'=>'Active','adate'=>Date("Y-m-d H:i:s"),'package'=>$user->amount);
          User::where('id',$user->user_id)->update($user_update);
          }
         

          Helper::add_direct_income($user->user_id,$user->amount);
      return redirect()->back()->with('message', 'Deposit request Approved successfully');
       }
       else
       {
          $update_data['status']= 'Failed'; 
       $user =  Investment::where('id',$id)->delete(); 
       return redirect()->back()->with('message', 'Deposit request Rejected successfully');
       }
    
    
      

    }
   
     public function task_approved_done(Request $request)
     {

        $id= $request->id ; // or any params
        $user_id= $request->user_Id ; // or any params
        $withdraw_status= $request->withdraw_status ; // or any params
         $invest_user = Investment::where('user_id',$user_id)->orderBy('id','desc')->limit(1)->first(); 

      if ($withdraw_status=="success")
       {
           if ($invest_user->plan=="1")
            {
             $percent=0.5;
            }
            else if($invest_user->plan=="2")
            {
             $percent=1;
            }
            else if($invest_user->plan=="3")
            {
             $percent=1;
            }
            else
            {
              $percent=0;
            }
           $comm=$invest_user->amount*$percent/100;
           if ($comm>0)
            {
              $update_data['status']= 'Approved'; 
              $update_data['approved_date']= Date("Y-m-d"); 
            Task::where('id',$id)->update($update_data); 

            $users = User::where('id',$user_id)->first();
            $income_update=array('user_id'=>$users->id,'ttime'=>Date("Y-m-d"),'user_id_fk'=>$users->id,'amt'=>$comm,'comm'=>$comm,'remarks'=>'Task Bonus','invest_id'=>$id); 
           Income::firstOrCreate(['invest_id' => $id,'ttime'=>Date("Y-m-d"),'user_id'=>$users->id],$income_update);
      return redirect()->back()->with('message', 'Task request Approved successfully');
           }
          
       }
       else
       {
          $update_data['status']= 'Reject'; 
          Task::where('id',$id)->update($update_data);
       return redirect()->back()->with('message', 'Task request Rejected successfully');
       }
    
    
      

    }


      public function block_submit(Request $request)
     {

        $id= $request->id; // or any params
        $update_data['active_status']= $request->status; 
       $user =  user::where('id',$id)->update($update_data);
      return redirect()->back()->with('message', 'User '.$request->status.' successfully');
    }


     public function change_password_post(Request $request)
    {

        try {
            $data = $request->all();
            $rules = array('old_password' => 'required', 'password' => 'required|confirmed');
            $msg = [
                'old_password.required'     => 'Old Password is required',
                'password.required'         => 'Password is required' ,
                'password.confirmed'        => 'Password must match'    ,
            ];

            $validator = Validator::make($data, $rules, $msg);
            if ($validator->fails())
                return Redirect::back()->withErrors($validator->getMessageBag()->first());

            $user = Auth::guard('admin')->user();
            // print_r($user);die();

            if (!\Hash::check($data['old_password'], $user->password))
                return Redirect::back()->withErrors('Current Password is incorrect');

            DB::Table('admins')->where('id', $user->id)->update(array(
                'password' => \Hash::make($data['password']),
                'updated_at' => new \DateTime
            ));

            return Redirect::Back()->with('message', 'password updated successfully');
        } catch (\Exception $e) {
            return Redirect::back()->witherrors($e->getMessage())->withInput();
        }

    }


    

}
