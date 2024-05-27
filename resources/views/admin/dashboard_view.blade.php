@include('layouts.admin.header')
@include('layouts.admin.sidebar')
 <?php
 use App\User;
 use App\Investment;
 use App\Income;
 use App\Withdraw;
 
 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      </ol>
      
    </section>


    <!-- Main content -->
    <section class="content container-fluid">
   <div class="row">
        <div class="col-lg-3 col-sm-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
          
            
              <h3>{{User::countAlluser()}}</h3>
              <p>Total User</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-sm-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{User::countPendinguser()}}</h3>
              <p>Pending Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-sm-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{User::countActiveuser()}}</h3>
              <p>Active Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
          <div class="col-lg-3 col-sm-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{User::countTodaysuser()}}</h3>
              <p>Today Registration</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

          <div class="col-lg-3 col-sm-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{Investment::countTodaysactiveted()}}</h3>
              <p>Today Activated</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
          <div class="col-lg-3 col-sm-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>	&#8377; {{Investment::counttotal_business()}} <span style="font-size: 14px;"></span><sup style="font-size: 20px"></sup></h3>
              <p>Total Bussiness</p>
            </div>
            <div class="icon">
              <!--<i class="ion ion-person-add"></i>-->
            </div>
           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
          <div class="col-lg-3 col-sm-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3> &#8377;  {{round(Income::count_level_bonus(),2)}} </h3>
              <p>Total Roi Bonus</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        

        <!-- ./col -->
       

     
       


        <div class="col-lg-3 col-sm-3 col-xs-12">
           <!--small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>	&#8377;  {{Withdraw::CounttotalPendingWithdaw()}} </h3>
              <p>Total Pending Withdraw</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
          <div class="col-lg-3 col-sm-3 col-xs-12">
           <!--small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>  &#8377;  {{Withdraw::CounttotalWithdaw()}}</h3>
              <p>Total Approved Withdraw</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        

        <!-- ./col -->
        
        
        
        
        
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('layouts.admin.footer')