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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Activation</a></li>
                                            <li class="breadcrumb-item active">Generate Pin</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Generate Pin</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                                <div class="col-md-6">
                                    <div class="card-box">
                                        <h4 class="header-title mb-3">Generate Pin</h4>
    
                                     <form method="POST"  enctype="multipart/form-data" action="{{route('Submit-GeneratPin')}}" >
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
                                                <label for="exampleInputEmail1">Generate Pin Type</label>
                                                <select name="type" class="form-control" id="payment" required="" >
                                      
                                      <option value="500">500 TRX -50 TRX EPIN</option>
                                 
                                      <option value="1000">1000 TRX - 100 TRX EPIN</option>
                                      <option value="5000">5000 TRX - 500 TRX EPIN</option>
                                      <option value="10000">10000 TRX - 1000 TRX EPIN</option>
                                      <option value="25000">25000 TRX - 2500 TRX EPIN</option>
                                      <option value="50000">50000 TRX - 5000 TRX EPIN</option>
                    
                                    </select>
                                            </div>
                                           
                                              
                                        
                                       <div class="form-group">
                                                <label for="exampleInputPassword1">Enter E Pin Qty</label>
                                                <input type="number"  class="form-control" name="pins" placeholder="Enter E Pin Qty" required="" >
                                            </div>


                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Payment Wallet</label>
                                               <select name="wallet" class="form-control" id="payment" required="" >
                                      
                                      <option value="1">Fund Wallet</option>
                                 
                                      <option value="2">User Balance</option>
                    
                                    </select>
                                            </div>
                                            

                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                     
                            </div>
                            <!-- end row -->
                              <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">

                                           <form action="{{ route('Generate-pin') }}" method="GET">
             <div class="form-inline">
                 
                 <div class="form-group">                      
                   <input type="text" Placeholder="Search Users" name="search"  class="form-control" value='{{@$search}}'>              
                 </div> &nbsp;&nbsp;&nbsp;
                  <div class="form-group">                      
                  <select name="limit" class="form-control">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>              
                 </div> 
                 <input type="submit" name="submit" class="btn btn-primary m-1 btn-sm" value="Search" />
         <a href="{{ route('Generate-pin') }}" name="reset" class="btn btn-primary btn-sm" value="Reset" />Reset</a>
            </div>
        </form>
        <br>
                      
                                        
    <table id="datatable" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    
                                          <thead>
                                                        <tr>
                                                            <th>Sr No</th>
                                                            <th>Pin No</th>
                                                            <th>Amount</th>
                                                            <th>Transection Date</th>
                                                       
                                                            <th>Wallet</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                     <?php if(is_array($level_income) || is_object($level_income)){ ?>

                                                      <?php $cnt =$level_income->perPage() * ($level_income->currentPage() - 1); ?>
                                                       @foreach($level_income as $value)
                                                        <tr>
                                                            <td><?= $cnt += 1?></td>
                                                      
                                                            <td>{{$value->pin}}</td>
                                                            <td>{{$value->remarks}}</td>
                                                            <td>{{$value->created_at}}</td>
                                                            <td>{{($value->wallet==1)?"Fund Wallet":"User Balance"}}</td>
                                                          
                                                           
                                                           
                                                        </tr>
                                                        @endforeach

                                                   <?php }?>                                                        
                                                       
                                                    </tbody>
                                                    
                  
                </table>
                <br>
                {{ $level_income->links() }}
                                                
                                    </div>
                                </div>
                            </div> <!-- end row -->
    
    
                            <!-- Inline Form -->
                   
                            <!-- end row -->
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->


		<!--end page-wrapper-->
	@include('layouts.upnl.footer')