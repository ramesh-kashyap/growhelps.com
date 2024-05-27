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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Support Ticket</a></li>
                                            <li class="breadcrumb-item active">Generate Ticket</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Generate Ticket</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="card-box">
                                    <h4 class="header-title">Generate Ticket</h4>
                               
                                    	<form method="POST"  action="{{route('ticket-submit')}}">
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
                                                <label for="exampleInputEmail1">Select Category</label>
                                                <select class="form-control" name="category" required="">
                                <option value="">Select Category</option>
                                <option value="Verification">Verification </option>
                                <option value="Technical">Technical</option>
                                <option value="Team Building">Team Building </option>
                                <option value="Financial">Financial</option>
                                <option value="Fund Issue">Fund Issue</option>
                                <option value="Others">Others</option>
                        </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Ticket No(optional)</label>
                                                <input type="text" class="form-control" name="ticket_no"  placeholder="Ticket No(optional)">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Message</label>
                                               <textarea class="form-control" name="message" placeholder="Message"></textarea>
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

                     


                        </div>
                        <!-- end row -->
                  <!-- end row -->
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

                

		<!--end page-wrapper-->
	@include('layouts.upnl.footer')