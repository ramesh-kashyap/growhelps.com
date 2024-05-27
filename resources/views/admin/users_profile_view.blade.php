 @include('layouts.admin.header')
@include('layouts.admin.sidebar')



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User Profile</a></li>
        <li class="active">dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
     <div class="row">
        <div class="col-md-6 col-md-offset-3">

          <!-- Profile Image -->
          <div class="box box-primary">
           
                 <form method="POST" action="{{route('update-user-profile')}}" class="form-update">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ asset('public/admin/assets/avatar5.png') }}" alt="User profile picture">
               <input type="hidden" name="id" value="<?= $profile->id; ?>">
              <h3 class="profile-username text-center"><?= $profile->username; ?></h3>

               @if(session()->has('message'))
                                        <div class="alert alert-success">
                                        <strong style="color:#006633;">
                                        {{ session()->get('message') }}
                                        </strong>
                                        </div>
                                        @endif

                                             @if ($errors->any())
                                            <div class="alert alert-danger">
                                            <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                            </ul>
                                            </div>
                                            @endif

                                              @csrf

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Name</b> <a class="pull-right"><lebel class="lvl"><?= $profile->name; ?></lebel><input type="text" name="name" value="<?= $profile->name; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a> 
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><lebel class="lvl"><?= $profile->email; ?></lebel><input type="text" name="email" value="<?= $profile->email; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
                <li class="list-group-item">
                  <b>Mobile Number</b> <a class="pull-right"><lebel class="lvl"><?= $profile->phone; ?></lebel><input type="text" name="phone" value="<?= $profile->phone; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>

                 <li class="list-group-item">
                  <b>Tron Address</b> <a class="pull-right"><lebel class="lvl"><?= $profile->trx_addres; ?></lebel><input type="text" name="trx_addres" value="<?= $profile->trx_addres; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
                 <li class="list-group-item">
                  <b>Password</b> <a class="pull-right"><lebel class="lvl address_lvl"> Change Password</lebel><input type="text" name="password" value="" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
                <!-- <li class="list-group-item">
                  <b>Account Holder</b><a class="pull-right"><lebel class="lvl address_lvl"><?php if(isset($bank->account_holder)) echo $bank->account_holder; ?></lebel><input type="text" name="account_holder" value="<?php if(isset($bank->account_holder)) echo $bank->account_holder; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
                <li class="list-group-item">
                  <b>Bank Name</b><a class="pull-right"><lebel class="lvl address_lvl"><?php if(isset($bank->bank_name)) echo $bank->bank_name; ?></lebel><input type="text" name="bank_name" value="<?php if(isset($bank->bank_name)) echo $bank->bank_name; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
             <li class="list-group-item">
                  <b>Branch Name</b><a class="pull-right"><lebel class="lvl address_lvl"><?php if(isset($bank->branch_name)) echo $bank->branch_name; ?></lebel><input type="text" name="branch_name" value="<?php if(isset($bank->branch_name)) echo $bank->branch_name; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
            <li class="list-group-item">
                  <b>Account No</b><a class="pull-right"><lebel class="lvl address_lvl"><?php if(isset($bank->account_no)) echo $bank->account_no; ?></lebel><input type="text" name="account_no" value="<?php if(isset($bank->account_no)) echo $bank->account_no; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
            <li class="list-group-item">
                  <b>Ifsc Code</b><a class="pull-right"><lebel class="lvl address_lvl"><?php if(isset($bank->ifsc_code)) echo $bank->ifsc_code; ?></lebel><input type="text" name="ifsc_code" value="<?php if(isset($bank->ifsc_code)) echo $bank->ifsc_code; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
        -->
       
              </ul>
             <div class="row inp_cng" style="display: none;">
               <div class="col-md-6">
                  <button type="button" class="btn btn-danger btn-block" id="show_normal"><b>Cancel</b></button>
               </div>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary btn-block"><b>Save Change</b></button>
               </div>
             </div>

              <button type="button" class="btn btn-primary btn-block lvl" id="show_form"><b>Update</b></button>
            </div>
            <!-- /.box-body -->
         </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('layouts.admin.footer')