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
                                            <li class="breadcrumb-item active">Available Pin Report</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Available Pin Report</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                            <!-- end row -->
                              <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">

                                           <form action="{{ route('AvailablePin') }}" method="GET">
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
         <a href="{{ route('AvailablePin') }}" name="reset" class="btn btn-primary btn-sm" value="Reset" />Reset</a>
            </div>
        </form>
        <br>
                      
                                        
    <table id="datatable" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
     <thead>
                            <tr>
                                                       <th>S NO.</th>
                 
                
                  
                  <th>User ID</th>
                 
                  <th>Pin Quantity</th>
                   <th>Generate Date.</th>
                   <th>Pin Type</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                     <?php if(is_array($level_income) || is_object($level_income)){ ?>

                                                      <?php $cnt =$level_income->perPage() * ($level_income->currentPage() - 1); ?>
                                                       @foreach($level_income as $value)
                                                        <tr>
                                                            <td><?= $cnt += 1?></td>
                               <td>{{$value->user_id_fk}}</td>
                     
                        <td> {{$value->pinvalue}}</td>
                   
                      <td>{{$value->created_at}}</td>
                      <td>{{$value->remarks}}</td>
                  
                                                          
                                                           
                                                           
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