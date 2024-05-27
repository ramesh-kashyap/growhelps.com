<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Ticket;
use App\Task;
use App\TaskUserUrl;
use App\AddTaskUrl;
use App\AddTaskLimit;
use Validator;
use Hash;
use Carbon\Carbon;
use Log;
use Redirect;
use DB;
class TaskController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(Request $request)
    {

    $user=Auth::user();
    // $limit=AddTaskLimit::where('id',2)->select('limit'); 
    $todays=Date('Y-m-d');
    $limit = AddTaskLimit::select('*')->first();
    $urlRondom=AddTaskUrl::select('*')->limit($limit->limit)->inRandomOrder()->get();
    $checkToday=TaskUserUrl::select('*')->where('user_id',$user->id)->where('tdate',$todays)->first();
     
     if (empty($checkToday)) 
     {
  
      if (!empty($urlRondom)) 
      {

       foreach ($urlRondom as $key => $value)
        {
          $data = [
                    
                        'url' =>$value->url,
                        'user_id' => $user->id,             
                        'status' => 'Pending',
                        'tdate' => Date("Y-m-d"),
                        
                    ];

            $payment =  TaskUserUrl::create($data);


        }
      }
     }
   
 
     

          $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = TaskUserUrl::where('user_id',$user->id)->where('status','Pending');      
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('user_id', 'LIKE', '%' . $search . '%')          
              ->orWhere('url', 'LIKE', '%' . $search . '%')
              ->orWhere('status', 'LIKE', '%' . $search . '%')
              ->orWhere('tdate', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

        return view('upnl.task')->with(['level_income'=>$notes])->with('search', $search);
    }


  public function TaskReports(Request $request)
    {

    	 $user=Auth::user();

          $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = TaskUserUrl::where('user_id',$user->id)->where('status','Approved');      
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('user_id', 'LIKE', '%' . $search . '%')          
              ->orWhere('url', 'LIKE', '%' . $search . '%')
              ->orWhere('status', 'LIKE', '%' . $search . '%')
              ->orWhere('tdate', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

       return view('upnl.task-report')->with(['level_income'=>$notes])->with('search', $search);
    }


            public function SubmittaskBonus(Request $request)
    {


      try{
      	$todays=Date("Y-m-d");
            $validation =  Validator::make($request->all(), [
                // 'user_id' => 'required',

                'url' => 'required',
              
               
               
              
            ]);

            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
            $user=Auth::user();
           $invest_check=Task::where('user_id',$user->id)->where('tdate',$todays)->orderBy('id','desc')->limit(1)->first();
           if (!empty($invest_check)) 
           {
           	    return Redirect::back()->withErrors(array('todays task Request Already Submitted!'));
           }
           
             $data = [
                    
                        'url' =>$request->url,
                        'user_id' => $user->id,
                        'user_id_fk' => $user->username,                 
                        'status' => 'Pending',
                        'tdate' => Date("Y-m-d"),
                        
                    ];
                    $payment =  Task::create($data);
            
            
          


          return redirect()->route('user-task')->with('messages', ' Task Request Generate successfully');
                
             
                 

          }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            // print_r($e->getMessage());
            // die("hi");
            return  redirect()->route('user-task')->withErrors('error', $e->getMessage())->withInput();
        }

    }     


     public function Update_Task_Status(Request $request)
    {

            print_r($request->id);
          $profile = TaskUserUrl::where('id',$request->id)->update(array('status'=>'Approved'));   
          return $request->id;
            

    }

}
