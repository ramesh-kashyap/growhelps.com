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
                            <div class="col-lg-6">

                                <div class="card-box">
                                    <h4 class="header-title">Basic Information</h4>
                               
                                    	<form method="POST"  action="{{route('update-profile')}}">
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
												<label>Referral ID</label>
												<input type="text"  readonly="" value="{{(@$sponsor_details->username)?$sponsor_details->username:0}}" class="form-control" />
											</div>
											<div class="form-group">
												<label>Referral Name</label>
												<input type="text" readonly="" value="{{(@$sponsor_details->name)?$sponsor_details->name:0}}" class="form-control" />
											</div>
										
										<div class="form-group">
											<label>UserName.</label>
											<input type="text" value="{{@$profile_data->username}}" readonly="" class="form-control" />
										</div>
										<div class="form-group">
											<label>Full Name</label>
											<input type="text" value="{{@$profile_data->name}}" name="name" class="form-control" />
										</div>
										<div class="form-group">
											<label>Email ID</label>
											<input type="text" value="{{@$profile_data->email}}" name="email" class="form-control" />
										</div>
										<div class="form-group">
											<label>Mobile No</label>
											<input type="text" value="{{@$profile_data->phone}}" name="phone" class="form-control" />
										</div>

                                      
										<div class="form-group">
											<label>Registration On</label>
											<input type="text" value="{{@$profile_data->created_at}}"  readonly="" name="jdate" class="form-control" />
										</div>
                                        <div class="form-group">
                                            <div class="checkbox checkbox-purple">
                                                <input required="" id="checkbox6a" type="checkbox">
                                                <label for="checkbox6a">
                                                    Remember me
                                                </label>
                                            </div>

                                        </div>

                                        <div class="form-group text-right mb-0">
                                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                                Cancel
                                            </button>
                                        </div>

                                    </form>
                                </div> <!-- end card-box -->
                            </div>
                            <!-- end col -->

                     
         <div class="col-lg-6">

                                <div class="card-box">
                                    <h4 class="header-title">Bank Details</h4>
                               
                                        <form method="POST"  action="{{route('bank-update')}}">
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
                                                <label>Account Holder</label>
                                                <input type="text"  placeholder="Account Holder" name="account_holder" value="{{@$bank_value->account_holder}}" class="form-control" />
                                            </div>
                                            
                                        
                                        <div class="form-group">
                                            <label>Bank Name.</label>
                                            <input type="text" value="{{@$bank_value->bank_name}}" placeholder="Bank Name"  name="bank_name" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Branch Name</label>
                                            <input type="text" value="{{@$bank_value->branch_name}}"  placeholder="Branch Name" name="branch_name" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input type="text" placeholder="Account Number" value="{{@$bank_value->account_no}}" name="account_no" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Ifsc Code</label>
                                            <input type="text" placeholder="Ifsc Code" value="{{@$bank_value->ifsc_code}}" name="ifsc_code" class="form-control" />
                                        </div>

                                       
                                        <div class="form-group">
                                            <div class="checkbox checkbox-purple">
                                                <input required="" id="checkbox6" type="checkbox">
                                                <label for="checkbox6">
                                                    Remember me
                                                </label>
                                            </div>

                                        </div>

                                        <div class="form-group text-right mb-0">
                                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                                Cancel
                                            </button>
                                        </div>

                                    </form>
                                </div> <!-- end card-box -->
                            </div>


                        </div>

                        </div>
                        <!-- end row -->


                  <!-- end row -->
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

                

		<!--end page-wrapper-->
	@include('layouts.upnl.footer')