<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>GrowHelps || Userpanel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('mainsite/assets/images/fav.png')}}">
        <link href="{{asset('assets/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
        <!-- C3 Chart css -->
        <link href="{{asset('assets/libs/c3/c3.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
<style>
body {
    margin: 0;
    font-family: Montserrat,sans-serif;
    font-size: .8rem;
    font-weight: 400;
    line-height: 1.5;
    color: #6c757d;
    text-align: left;
    background: url('{{asset('mainsite/img/map.jpg')}}');
}
.left-side-menu {
    width: 240px;
    background: #000000;
    bottom: 0;
    padding: 20px 0;
    position: fixed;
    -webkit-transition: all .2s ease-out;
    transition: all .2s ease-out;
    top: 70px;
    -webkit-box-shadow: 0 0 35px 0 rgba(154,161,171,.15);
    box-shadow: 0 0 35px 0 rgba(154,161,171,.15);
}
.logo-box {
    height: 70px;
    width: 240px;
    float: left;
    background-color: #000000;
    -webkit-transition: all .2s ease-out;
    transition: all .2s ease-out;
}

.text-uppercase {
    text-transform: uppercase!important;
    font-weight: 500;
    color: #000;
    /*text-shadow: 2px 1px 7px rgb(243 155 62);*/
    font-size: 13px;
}
*, ::after, ::before {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
    .navbar-custom {
    background-color:#e09b40;
    padding: 0 10px 0 0;
    position: fixed;
    left: 0;
    right: 0;
    height: 70px;
    z-index: 100;
}
.navbar-custom .app-search .form-control {
    border: none;
    height: 38px;
    padding-left: 20px;
    padding-right: 0;
    color: #fff;
    background: #64c5b1;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-radius: 30px 0 0 30px;
}
.navbar-custom .app-search .btn {
    background: #64c5b1;
    color: rgba(255,255,255,.7);
    border-color: transparent;
    border-radius: 0 30px 30px 0;
    -webkit-box-shadow: none!important;
    box-shadow: none!important;
}
#sidebar-menu>ul>li>a {
    color: #ffffff;
    display: block;
    padding: 11px 20px;
    position: relative;
    margin: 2px 0;
    -webkit-transition: all .4s;
    transition: all .4s;
    font-size: 14.4px;
}
.left-side-menu {
    width: 240px;
    background: #011727;
    bottom: 0;
    padding: 20px 0;
    position: fixed;
    -webkit-transition: all .2s ease-out;
    transition: all .2s ease-out;
    top: 70px;
    -webkit-box-shadow: 0 0 35px 0 rgb(154 161 171 / 15%);
    box-shadow: 0 0 35px 0 rgb(154 161 171 / 15%);
}
.logo-box {
    height: 70px;
    width: 240px;
    float: left;
    background-color: #011727;
    -webkit-transition: all .2s ease-out;
    transition: all .2s ease-out;
}
.nav-second-level li a, .nav-thrid-level li a {
    padding: 8px 20px;
    color: #ffffff;
    display: block;
    position: relative;
    -webkit-transition: all .4s;
    transition: all .4s;
}
.nav-second-level li.mm-active>a, .nav-third-level li.mm-active>a {
    color: #ffffff;
}
a:hover {
    color: #5553ce !important;
}

</style>
    <body >

        <!-- Begin page -->
        <div id="wrapper">

         <style type="text/css">
   .card-box {
    background-color: #fff;
    padding: 0.8rem;
    -webkit-box-shadow: 0 0 35px 0 rgba(154,161,171,.15);
    /* box-shadow: 0 0 35px 0 rgba(154,161,171,.15); */
    margin-bottom: 24px;
    box-shadow: 7px 7px 4px 3px grey;
    border-radius: .25rem;
}
 </style>  
    
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">


                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{asset('mainsite/assets/images/fav.png')}}" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                {{Auth::user()->name}}  <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome ! ({{Auth::user()->username}}) </h6>
                            </div>

                            <!-- item-->
                            <a href="{{route('user-profile')}}" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>Profile</span>
                            </a>

                            <!-- item-->
                             <a href="{{route('security')}}" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Change Password</span>
                            </a>

                            <!-- item-->
                           
                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="{{route('logout')}}" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="{{route('home')}}" class="logo text-center">
                        <span class="logo-lg">
                            <img src="{{asset('mainsite/assets/images/logo_dark.png')}}" style="width: 176px;
    padding-top: 0px;
    height: 92px;" alt="">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
                            <img src="{{asset('mainsite/img/logo/1-2.png')}}" alt="" height="28">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li class="d-none d-sm-block">
                            <form class="app-search">
                                <div class="app-search-box">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </li>

                </ul>
            </div>
            <!-- end Topbar -->

            
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navigation</li>
                            <li class="menu-title" style="color: #fff">{{Auth::user()->name}} ({{Auth::user()->active_status}})</li>

                           

                            <li>
                                <a href="{{route('home')}}">
                                    <i class="fe-airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-sidebar"></i>
                                    <span> Profile  </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('user-profile')}}">Edit Profile</a></li>
                                     <li><a href="{{route('security')}}">Change Password</a></li> 
                                   
                                </ul>
                            </li>

                          

                            <li>
                                <a href="javascript:void(0);">
                                    <i class="fe-file-plus"></i>
                                    <span> Activation </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('make-deposit')}}">Make Deposit</a></li>
                                 
                                    <li><a href="{{route('deposit-list')}}">Request History</a></li>
                                 
                                </ul>
                            </li>

                          


                             <li>
                                <a href="javascript: void(0);">
                                  <i class="fe-box"></i>
                                    <span>E-Pin Section  </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <!--<li><a href="member/withdraw">Withdrawal Request</a></li>-->
                                    <li><a href="{{route('transfer-pin')}}">Pin Transfer</a></li>
                                    <li><a href="{{route('pintransfered')}}">Transfer Reports</a></li>
                                    <li><a href="{{route('Used-pin')}}">Used Pin</a></li>
                                    <li><a href="{{route('AvailablePin')}}">Available Pin</a></li>
                                                                    </ul>
                            </li>

                          

                       

                          

                            <li>
                                <a href="javascript: void(0);">
                                  <i class="fe-layers"></i>
                                    <span> Network </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('direct-users')}}">Referrals Team</a></li>
                                     <li><a href="{{route('total-users')}}">Level Team </a></li>
                                    
                                    <!--<li><a href="{{route('Left-users')}}">Left Users </a></li>-->
                                    <!--<li><a href="{{route('Right-users')}}">Right Team </a></li>-->
                                   
                                  
                                                                    </ul>
                            </li>
                            



                            <li>
                                <a href="javascript: void(0);">
                                  <i class="fe-layers"></i>
                                    <span> Bonus Reports </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <!--<li><a href="{{route('level-bonus')}}">Performance Bonus</a></li>-->
                                    <li><a href="{{route('roi-bonus')}}">Roi Bonus </a></li>
                                    <!--<li><a href="{{route('royal-bonus')}}">Royal Magic Bonus </a></li>-->
                                    <!--<li><a href="{{route('direct-bonus')}}">Level Bonus </a></li>-->
                                    
                                                                    </ul>
                            </li>

                            <!--  <li>-->
                            <!--    <a href="javascript: void(0);">-->
                            <!--     <i class="fa fa-trophy" aria-hidden="true"></i>-->

                            <!--        <span> Achievement  </span>-->
                            <!--        <span class="menu-arrow"></span>-->
                            <!--    </a>-->
                            <!--    <ul class="nav-second-level" aria-expanded="false">-->
                                  
                            <!--        <li><a href="{{route('reward-status')}}">Level Achievement </a></li>-->
                            <!--        <li><a href="{{route('club-status')}}">Club Achievement </a></li>-->
                            <!--                                        </ul>-->
                            <!--</li>-->



                            <li>
                                <a href="{{route('payment-ledger')}}">
                                    <i class="fe-sidebar" ></i>
                                    <span> Payment Ledger </span>
                                </a>
                            </li>

                            

                            <li>
                                <a href="javascript: void(0);">
                                  <i class="fe-box"></i>
                                    <span> Withdrawal  </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <!--<li><a href="member/withdraw">Withdrawal Request</a></li>-->
                                    <!-- <li><a href="{{route('withdraw-request')}}">Withdraw Request</a></li> -->
                                    <li><a href="{{route('withdraw-report')}}">Withdrawal Reports</a></li>
                                                                    </ul>
                            </li>
 <li>
                                <a href="javascript: void(0);">
                                  <i class="fe-layers"></i>
                                    <span> Support Ticket  </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <!--<li><a href="member/withdraw">Withdrawal Request</a></li>-->
                                    <li><a href="{{route('generate-ticket')}}">Generate Ticket</a></li>
                                    <li><a href="{{route('support-message')}}">Support Message</a></li>
                                                                    </ul>
                            </li>


                         
                          
                         
                        <li>
                                <a href="{{route('logout')}}">
                                    <i class="fa fa-power-off" ></i>
                                    <span> Logout </span>
                                </a>
                            </li>
                         
                       
                        
                        
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->