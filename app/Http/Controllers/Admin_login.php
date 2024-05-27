<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use Auth;
use Redirect;
use App\Admin;
class Admin_login extends Controller
{
  public function index()
    {  
     
    return view('admin.admin_login_view');
    }



 public function admin_sign_out()
    {
         Auth::guard('admin')->logout();
        return redirect('/admin-login');
    }


       public function admin_login(Request $request)
    {
        try
        {
            $validation =  Validator::make($request->all(), [
                'user' => ['required'],
                'password' => ['required'],

            ]);
        
          
            $request['dynamic_column'] = 'user';
            $request['dynamic_value'] = $request['user'];
            $admin = Admin::return_by_dynamic($request);
            //dd($admin); die;
            if(!empty($admin) && isset($admin))
            {

                
                if (\Hash::Check($request['password'], $admin->password)){
                    
                    Auth::guard('admin')->login($admin);
                    $user = Auth::guard('admin')->user();
                    // dd("hhhhh");die();
                    return redirect()->route('admin_dashboard');
                  
                }
                else
                {
                    return redirect()->route('admin-login')->with('error', 'Credentials are wrong');
                    // echo "credentials are invalid"; die;
                    // return back()
                 }
            }
            else
            {
                return redirect()->route('admin-login')->with('error', 'Credentials are wrong');
                // echo "credentials are invalid"; die;
               // return back()->with('error', 'Credentials are wrong');
            }
        
        }catch(\Exception $e){
             return redirect()->route('admin-login')->with('error', 'Credentials are wrong');
        }
        
    }
}
