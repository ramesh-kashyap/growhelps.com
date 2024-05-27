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
                                            <li class="breadcrumb-item active">Buy Funds</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Buy Funds</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                                <div class="col-md-6">
                                    <div class="card-box">
                                        <h4 class="header-title mb-3">Buy Funds</h4>
    
                                     <form method="POST"  enctype="multipart/form-data" action="{{route('Submit-BuyFund')}}" >
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
                                                <label for="exampleInputEmail1">Enter Amount</label>
                                               <input type="text"  class="form-control" name="amount" placeholder="Enter Amount" required="" >
                                            </div>
                                           
                                              
                                        
                                       <div class="form-group">
                                                <label for="exampleInputPassword1">Payment Option</label>
                                               <select name="type" class="form-control" id="payment" required="" >
                                      
                                      <option value="">Payment Option</option>
                                 
                                      <option value="TRX">TRX</option>
                    
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

                                           <form action="{{ route('Buy-Funds') }}" method="GET">
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
         <a href="{{ route('Buy-Funds') }}" name="reset" class="btn btn-primary btn-sm" value="Reset" />Reset</a>
            </div>
        </form>
        <br>
                      
                                        
    <table id="datatable" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    
                                          <thead>
                                                        <tr>
                                                            <th>Sr No</th>
                                                            <th>User ID</th>
                                                            <th>Amount</th>
                                                            <th>Transection Date</th>
                                                            <th>Transection ID</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                     <?php if(is_array($level_income) || is_object($level_income)){ ?>

                                                      <?php $cnt =$level_income->perPage() * ($level_income->currentPage() - 1); ?>
                                                       @foreach($level_income as $value)
                                                        <tr>
                                                            <td><?= $cnt += 1?></td>
                                                      
                                                            <td>{{$value->user_id_fk}}</td>
                                                            <td>{{$value->amount}} TRX</td>
                                                            <td>{{$value->created_at}}</td>
                                                            <td>{{$value->txn_no}}</td>
                                                           <td ><span class="badge badge-{{($value->status=='Approved')?'success':'danger'}}">{{$value->status}}</span></td>
                                                           
                                                           
                                                        </tr>
                                                        @endforeach

                                                   <?php }?>                                                        
                                                       
                                                    </tbody>
                                                    
                  
                </table>
                <br>
                 {{ $level_income->withQueryString()->links() }}
                                                
                                    </div>
                                </div>
                            </div> <!-- end row -->
    
    
                            <!-- Inline Form -->
                   
                            <!-- end row -->
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->


		<!--end page-wrapper-->
	@include('layouts.upnl.footer')