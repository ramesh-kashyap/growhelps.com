@include('layouts.admin.header')
@include('layouts.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Change Password
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
        <div class="col-md-8 col-md-offset-2">
          <div class="box box-info">
            <!-- form start -->
         <form action="{{route('change-password-post')}}" method="POST">
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

              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Old password</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputEmail3" placeholder="Old password" type="text" name="old_password">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">New Password</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputEmail3" placeholder="New password" type="text" name="password">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Retype Again</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputEmail3" placeholder="Retype New password" type="text" name="password_confirmation">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Confirm</button>
              </div>
              <!-- /.box-footer -->
      </form>
          </div>

      </div>
        </div>
          <!-- /.box -->
   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('layouts.admin.footer')
