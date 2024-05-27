<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\User;
use App\Bank;
use Validator;
use Hash;
use Carbon\Carbon;
use Log;
use Redirect;
use DB;
use Auth;
use Helper;

class Profile extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user=Auth::user();
        $profile_data = User::where('id',$user->id)->orderBy('id','desc')->first();
        $sponsor_details = Helper::runQuery(array('name','username'),"users",$profile_data->sponsor,"id");
        $bank_value = Bank::where('user_id',$user->id)->orderBy('id','desc')->first();
        // print_r($profile);die();
        return view('upnl.profile')->with(compact('profile_data','sponsor_details','bank_value'));
    } 

     public function change_password()
    {
        $user=Auth::user();
      
        return view('upnl.change-password');
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

            $user = Auth::user();

            if (!\Hash::check($data['old_password'], $user->password))
                return Redirect::back()->withErrors('Current Password is incorrect');

            DB::Table('users')->where('id', $user->id)->update(array(
                'password' => \Hash::make($data['password']),
                'PSR' => $data['password'],
                'updated_at' => new \DateTime
            ));

            return Redirect::Back()->with('message', 'password updated successfully');
        } catch (\Exception $e) {
            return Redirect::back()->witherrors($e->getMessage())->withInput();
        }

    }

      public function change_trxpassword_post(Request $request)
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

            $user = Auth::user();

            if (!\Hash::check($data['old_password'], $user->tpassword))
                return Redirect::back()->withErrors('Current Password is incorrect');

            DB::Table('users')->where('id', $user->id)->update(array(
                'tpassword' => \Hash::make($data['password']),
                 'TPSR' => $data['password'],
                'updated_at' => new \DateTime
            ));

            return Redirect::Back()->with('messages', 'Transaction password updated successfully');
        } catch (\Exception $e) {
            return Redirect::back()->witherrors($e->getMessage())->withInput();
        }

    }

    
    public function profile_update(Request $request)

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

            $id=Auth::user()->id;
            //check if email exist
          $post_array  = $request->all();

          $update_data['name']=$post_array['name'];
          $update_data['phone']=$post_array['phone'];
          $update_data['email']=$post_array['email'];
          // $update_data['trx_addres']=$post_array['trx_addres'];
          
          $user =  user::where('id',$id)->update($update_data);

        return redirect()->back()->with('messages', 'Updated successfully');

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



    public function bank_profile_update(Request $request)

    {
        try{
            $validation =  Validator::make($request->all(), [
                'account_holder' => 'required',
                'bank_name' => 'required',
                'branch_name' => 'required',
                'ifsc_code' => 'required',
                'account_no' => 'required|numeric'
              
            ]);

            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());
                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }

            $id=Auth::user()->id;
              
             $check_exist=Bank::where('user_id', $id)->first();
             
             $bank_array=array(

                 'user_id'=>$id,
                 'bank_name'=>$request->bank_name,
                 'account_holder'=>$request->account_holder,
                 'branch_name'=>$request->branch_name,
                 'account_no'=>$request->account_no,
                 'ifsc_code'=>$request->ifsc_code,                
             );
           if (!empty($check_exist))
             {
              $bank= Bank::where('user_id', $id)->update($bank_array);
            }
            else
            {        
              $bank=Bank::create($bank_array);
            }
        

        return redirect()->back()->with('message', 'Bank Updated successfully');

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


}
