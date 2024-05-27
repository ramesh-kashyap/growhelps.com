 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('admin/assets/avatar5.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menus</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="admin_dashboard"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
        <!-- <li class="active"><a href="admin_dashboard/change_roi"><i class="fa fa-link"></i> <span>Change ROI</span></a></li> -->
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Activation</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('activeusers')}}">Active User</a></li>
            <li><a href="{{route('deposit-request')}}">Pending Deposit</a></li>
          </ul>
        </li>
         <!--<li><a href="{{route('activate-user')}}"><i class="fa fa-link"></i> <span>Add User Club</span></a>-->
         <!--</li>-->
    <!-- <li class="treeview">
      <a href="#"><i class="fa fa-link"></i> <span>Rewards</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="admin_dashboard/eligiblerewards">Eligible Users</a></li>
        <li><a href="admin_dashboard/sentrewards">Sent Rewards</a></li>
      </ul>
    </li> -->
    <!--<li class="treeview">
      <a href="#"><i class="fa fa-link"></i> <span>Booster</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="admin_dashboard/eligiblebooster">Eligible Users</a></li>
        <li><a href="admin_dashboard/sentbooster">Sent Booster</a></li>
      </ul>
    </li>-->
     <!--<li class="active"><a href="/admin_dashboard/activate_admin"><i class="fa fa-link"></i> <span>Activate User</span></a></li>-->
         <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>User Management</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('users-deposit')}}">Deposit List</a></li>
            <li><a href="{{route('alluserlist')}}">All Users</a></li>
    
            <li><a href="{{route('edit_users')}}">Edit User</a></li>
            <li><a href="{{route('block-users')}}">Block User</a></li>
           
          </ul>
        </li>
    <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>E-Pin  Management</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('pin_tranfers')}}"><i class="fa fa-link"></i> <span>Pin Transfer</span></a></li>
            <li><a href="{{route('tranfer-pin-Report')}}"><i class="fa fa-link"></i> <span>E-pin Tranfer Report</span></a></li>
            <!-- <li><a href="{{route('Generate-pin-Report')}}"><i class="fa fa-link"></i> <span>E-pin Generate Report</span></a></li> -->
            <li><a href="{{route('Used-pin-Report')}}"><i class="fa fa-link"></i> <span>E-pin Used Report</span></a></li> 
             <li><a href="{{route('available-pin-Report')}}"><i class="fa fa-link"></i> <span>Available E-pin Report</span></a></li>
          </ul>
        </li>
        
    <li><a href="{{route('payments-ledgers')}}"><i class="fa fa-link"></i> <span>Payment Ledger</span></a></li>
   
         <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Bonus</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
             <!--<li><a href="{{route('LevelBonus')}}">Performance Bonus</a></li>-->
            <li><a href="{{route('RoiBonus')}}">Roi Bonus</a></li>
           
            <!--<li><a href="{{route('ReferalBonus')}}">Level Bonus</a></li>-->
            <!--<li><a href="{{route('GlobalCommunity')}}">Royal Magic Bonus</a></li>-->
            <!-- <li><a href="{{route('GlobalCommunity')}}">Task Bonus</a></li> -->
          
       <!--<li><a href="admin_dashboard/shopping_cashback">Shopping Cashback Bonus</a></li> -->
     
            
          </ul>
        </li>
       
      <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Withdraw</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="{{route('withdraw-request-user')}}">Withdraw Request</a></li> 
      <li><a href="{{route('withdraw-history-user')}}">Withdraw History</a></li>
      <!-- <li><a href="admin_dashboard/fund_history">Fund History</a></li> -->
            
          </ul>
        </li>
         <li class="treeview">
    
        <li><a href="{{route('change-admin-password')}}"><i class="fa fa-link"></i> <span>Change Admin Password</span></a></li>
         <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Support management</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('support-query')}} ">Support query</a></li>
            <!--<li><a href="admin_dashboard/reply_support_view">Reply to support</a></li>-->
          </ul>
        </li>
         <li><a href="{{route('admin_sign_out')}}"><i class="fa fa-link"></i> <span>Logout</span></a></li>
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
