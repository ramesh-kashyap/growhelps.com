@include('layouts.upnl.header')

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Member</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                                            <li class="breadcrumb-item active">Edit Profile</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">User Profile</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                               <div class="col-md-6">
                                    <div class="card-box">
                                        <h4 class="header-title mb-3">Change Login Password</h4>
    
                                       <form action="{{route('change-password')}}" method="POST">
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

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Old Password</label>
                                                <input type="password" class="form-control" required=""  name="old_password"   placeholder="Old Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">New Password</label>
                                                <input type="password" class="form-control" name="password"  required=""  placeholder=" New Password">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Retype New Password</label>
                                                <input type="password" class="form-control" required="" name="password_confirmation"   placeholder="Retype New Password">
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox checkbox-primary">
                                                    <input required="" id="checkbox1" type="checkbox">
                                                    <label for="checkbox1">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            <!-- end col -->
                               <div class="col-md-6">
                                    <div class="card-box">
                                        <h4 class="header-title mb-3">Change Transaction Password</h4>
    
                                       <form action="{{route('change-password-transaction')}}" method="POST">
										  @if(session()->has('messages'))
                                        <div class="alert alert-success">
                                        <strong style="color:#006633;">
                                        {{ session()->get('messages') }}
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

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Old Password</label>
                                                <input type="password" class="form-control" required=""  name="old_password"   placeholder="Old Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">New Password</label>
                                                <input type="password" class="form-control" name="password" id="onepassword" required=""  placeholder=" New Password">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Retype New Password</label>
                                                <input type="password" class="form-control" required="" name="password_confirmation"   placeholder="Retype New Password">
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox checkbox-primary">
                                                    <input required="" id="checkbox" type="checkbox">
                                                    <label for="checkbox">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>
                                    </div>
                                </div>
 

                        </div>
                        <!-- end row -->
                  <!-- end row -->
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

                

		<!--end page-wrapper-->
	@include('layouts.upnl.footer')