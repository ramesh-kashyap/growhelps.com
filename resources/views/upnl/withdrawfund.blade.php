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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Withdrawal</a></li>
                                            <li class="breadcrumb-item active">Withdrawal Request</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Withdrawal Request</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                      <div class="row">
                         <div class="col-lg-6">
                                <div class="card-box ribbon-box">
                                    <div class="ribbon ribbon-blue">Available Balance</div>
                                    <p class="mb-0" style="font-weight:900">&#8377; {{round(Auth::user()->available_balance(),2)}} </p>
                                </div>
                            </div>
                      </div>
                        <div class="row">

                                <div class="col-md-6">
                                    <div class="card-box">
                                        <h4 class="header-title mb-3">Withdrawal Request</h4>
    
                                      	<form method="POST"  action="{{route('WithdrawRequest')}}" >
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
                                                <label for="exampleInputPassword1">Request Amount</label>
                                                <input type="number" class="form-control" name="amount" min="25" value="" placeholder="Request Amount" required="" >
                                                <label>Deduction will be 10% on Withdrawal</label>
                                            </div> 
                                           
                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Payment Mode </label>
                                                <input type="text" id="account_id"  class="form-control" disabled="" name="user" value="INR" placeholder="To User ID" required="" >
                                            </div> 
                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Account Number</label>
                                                 <input type="text"  class="form-control" name="account_number" placeholder="Account Number" readonly="" value="{{@$bank_details->account_no}}" required="" >
                                            </div>  
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Transaction Password</label>
                                                <input type="text"  class="form-control" name="transaction_password" placeholder="Transaction Password" required="" >
                                            </div> 
                                            <button type="submit" class="btn btn-purple waves-effect waves-light" >Submit</button>
                                        </form>
                                    </div>
                                </div>
        <script>
      function selectamt(){
          
                var x = document.forms["spendform"]["amount"].value;
                var y = document.forms["spendform"]["balance"].value;
            // alert(x);
            // alert(y);
                 if (y<x) 
                 {
                  alert("insufficient funds");
                    return false;   
                 }
              

                }
                
                function check()
                {
                    var x = document.forms["spendform"]["amount"].value;
                    if(x < 700)
                    {
                        alert('minimum withdrawal is Rs.700');
                        return false;
                    }
                }
         </script>                           <!-- end col -->
               
                             
                            </div>
                            <!-- end row -->
    
    
                            <!-- Inline Form -->
                   
                            <!-- end row -->
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->


		<!--end page-wrapper-->
	@include('layouts.upnl.footer')