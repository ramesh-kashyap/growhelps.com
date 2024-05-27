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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Fund</a></li>
                                            <li class="breadcrumb-item active">Payment Confirmation</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Payment Confirmation</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                                <div class="col-md-6">
                                    <div class="card-box">
                                        <h4 class="header-title mb-3">Buy Funds</h4>
    
                                     <form method="POST"  enctype="multipart/form-data" action="{{route('SubmitActivation')}}" >
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
                                                <label for="exampleInputPassword1"><?=@$result['coin']?> Address</label>
                                             <input type="text" class="form-control" name="" placeholder="<?=@$result['add']?>" readonly="readonly" value="<?=@$result['add']?>">
                                 
                                            </div>
                                            
                                               <input type="hidden" value="<?=@$result['d_amt']?>" name="amt"/>
                                <input type="hidden" value="<?=@$result['coin']?>" name="type"/>
                              
                                           <div class="form-group">
                                                <label for="exampleInputPassword1"><?=@$result['coin']?> Amount </label>
                           <input type="number" class="form-control" name="amount" value="<?=@$result['amount']?>"  placeholder="" readonly/>
                                            </div>
                                              <div class="form-group">
                                                <label for="exampleInputPassword1">Transaction No</label>
                            
                                    <input type="text" class="form-control" name="txn_no" placeholder="<?=@$result['txn']?>" value="<?=@$result['txn']?>" readonly="readonly">
                                            </div>
                                          
                                    <div class="form-group">
                                                <label for="exampleInputPassword1">QR Code</label><br>
                            <a target="_blank" href="<?=@$result['qr']?>"><img  src="<?=@$result['qr']?>" /></a><br>
                            <label for="exampleInputPassword1">Scan QR Code to pay Tron</label><br>
                            <label for="exampleInputPassword1">Pay With Transaction Fee and Click on Submit after Payment Complete</label>
                                            </div>

                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>
                                    </div>
                                </div>
                               
                                       </div>
                            <!-- end row -->

    
    
                            <!-- Inline Form -->
                   
                            <!-- end row -->
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->


		<!--end page-wrapper-->
	@include('layouts.upnl.footer')