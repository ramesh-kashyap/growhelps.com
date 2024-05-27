<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class Frentsite extends Controller
{
  public function index()
    {

        return view('main_site.home');
    } 

     public function about()
    {
        return view('main_site.about');
    }
     public function faq()
    {
        return view('main_site.faq');
    }  public function plan()
    {
        return view('main_site.plan');
    } 
     public function affiliate()
    {
        return view('main_site.affiliate');
    }  
     public function support()
    {
        return view('main_site.support');
    } 
    public function service()
    {
        return view('main_site.service');
    }
    public function legal()
    {
        return view('main_site.legal');
    } public function bank()
    {
        return view('main_site.bank');
    }
}
