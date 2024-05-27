@include('layouts.upnl.header')

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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard </a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Withdrawal</a></li>
                                            <li class="breadcrumb-item active">Withdraw Reports</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Withdraw Reports</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">

   <form action="{{ route('withdraw-report') }}" method="GET">
             <div class="form-inline">
                 
                 <div class="form-group">                      
                   <input type="text" Placeholder="Search" name="search"  class="form-control" value='{{@$search}}'>              
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
         <a href="{{ route('withdraw-report') }}" name="reset" class="btn btn-primary btn-sm" value="Reset" />Reset</a>
            </div>
        </form>
        <br>
                                        
    <table id="datatable" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    
                                          <thead>
                                                                 <tr>
                                                            <th>Sr No</th>
                                                            <th>User ID</th>
                                                            <th>Amount</th>
                                                            
                                                            <th>Withdraw At</th>
                                                            <th>Payment Mode</th>
                                                            <th>Transaction ID</th>
                                                            <th>Status</th>
                                                           
                                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       <?php if(is_array($withdraw_report) || is_object($withdraw_report)){ ?>

                                                      <?php $cnt =$withdraw_report->perPage() * ($withdraw_report->currentPage() - 1); ?>
                                                       @foreach($withdraw_report as $value)
                                                        <tr>
                                                            <td><?= $cnt += 1?></td>
                                                           
                                                   
                                                            <td>{{$value->user_id_fk}}</td>
                                                            <td>{{$value->amount}}</td>
                                                           
                                                            <td>{{$value->wdate}}</td>
                                                            <td>{{$value->payment_mode}}</td>
                                                           
                                                            <td>{{$value->txn_id}}</td>
                                                            <td>{{$value->status}}</td>
                                                           
                                                        </tr>
                                                        @endforeach

                                                   <?php }?>                                                        
                                                       
                                                    </tbody>
                                                    
                  
                </table>
                <br>
             
                 {{ $withdraw_report->withQueryString()->links() }}
                                    </div>
                                </div>
                            </div> <!-- end row -->
    
    
                            <!-- end row -->
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->


    <!--end page-wrapper-->
    <!--start overlay-->
@include('layouts.upnl.footer')
  <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
