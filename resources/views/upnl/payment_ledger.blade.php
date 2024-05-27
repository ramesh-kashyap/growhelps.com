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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bonus Reports</a></li>
                                            <li class="breadcrumb-item active">Payment Ledger</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Payment Ledger</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
   <form action="{{ route('payment-ledger') }}" method="GET">
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
         <a href="{{ route('payment-ledger') }}" name="reset" class="btn btn-primary btn-sm" value="Reset" />Reset</a>
            </div>
        </form>
        <br>
                                        
    <table id="datatable" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
      <thead>
                                                        <tr>
                                                            <th>Sr No</th>
                                                             <th>Created At</th>
                                                            <th>Roi Bonus</th>
                                        
                                                            <th>Total</th>
                                                            <th>Deduction</th>
                                                            <th>Club Deduction</th>
                                                            <th>Payable Amount</th>
                                                           
                                                           
                                                           
                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       <?php if(is_array($level_income) || is_object($level_income)){ ?>

                                                      <?php $cnt =$level_income->perPage() * ($level_income->currentPage() - 1); ?>
                                                       @foreach($level_income as $value)
                                                        <tr>
                                                             <td><?= $cnt += 1?></td>
                                                           
                                                   
                                                           <td>{{$value->ttime}}</td>
                                                            <td>&#8377;  {{$value->distributor_bonus}}</td>
                                           
                                                            <td>&#8377;  {{$value->total}}</td>
                                                            <td>&#8377;  {{$value->deduction}}</td>
                                                            <td>&#8377;  {{$value->club_deduction}}</td>
                                                            <td>&#8377;  {{$value->payable_amt}}</td>
                                                           
                                                           
                                                            
                                                           
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
    
    
                            <!-- end row -->
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->


    <!--end page-wrapper-->
    <!--start overlay-->
@include('layouts.upnl.footer')
  <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>

