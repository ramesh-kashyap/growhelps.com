@include('layouts.upnl.header')
		<!--page-wrapper-->
	
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Member </a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Activation</a></li>
                                            <li class="breadcrumb-item active">Topup History</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Topup History</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
                                        
    <table id="datatable" class="table table-bordered nowrap"  style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    
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
                                                       <?php if(is_array($deposit_list) || is_object($deposit_list)){ ?>

                                                      <?php $cnt = 0; ?>
                                                       @foreach($deposit_list as $value)
                                                        <tr>
                                                            <td><?= $cnt += 1?></td>
                                                            <td>{{Auth::user()->username}}</td>
                                                   
                                                            <td>&#8377; {{$value->amount}}</td>
                                                            <td>{{$value->created_at}}</td>
                                                            <td>{{$value->transaction_id}}</td>
                                                            <td>{{$value->status}}</td>
                                                           
                                                        </tr>
                                                        @endforeach

                                                   <?php }?>                                                        
                                                       
                                                    </tbody>
									
                                        </table>
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
