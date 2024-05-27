
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">My Network</a></li>
                                            <li class="breadcrumb-item active">Downline Users</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Downline Users</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">


                    <form action="{{ route('total-users') }}" method="GET">
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
         <a href="{{ route('total-users') }}" name="reset" class="btn btn-primary btn-sm" value="Reset" />Reset</a>
            </div>
        </form>
        <br>
                                        
    <table id="datatable" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    
                                        <thead>
                                                        <tr>
                                                            <th>Sr No</th>
                                                            <th>Name</th>
                                                            <th>User ID</th>
                                                            <th>Email ID</th>
                                                            <th>Mobile No</th>
                                                            <th>Level</th>
                                                            <th>Referral By</th>
                                                            <th>Joining Date</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       <?php if(is_array($direct_team) || is_object($direct_team)){ ?>

                                                      <?php
                                                       $cnt = $direct_team->perPage() * ($direct_team->currentPage() - 1);

                                                       
                                                        ?>
                                                       @foreach($direct_team as $value)

                                                       <?php 
                                                        $sponsor_details = Helper::runQuery('username',"users",$value->sponsor,"id");
                                                       ?>
                                                        <tr>
                                                            <td><?= $cnt += 1?></td>
                                                            <td>{{$value->name}}</td>
                                                            <td>{{$value->username}}</td>
                                                            <td>{{$value->email}}</td>
                                                            <td>{{$value->phone}}</td>
                                                            <td>{{$value->level-Auth::user()->level}}</td>
                                                            <td>{{$sponsor_details->username}}</td>
                                                            <td>{{$value->created_at}}</td>
                                                            <td ><span class="badge badge-{{($value->active_status=='Active')?'success':'danger'}}">{{$value->active_status}}</span></td>
                                                           
                                                        </tr>
                                                        @endforeach

                                                   <?php }?>                                                        
                                                       
                                                    </tbody>
                                                    
                  
                </table>
                <br>
                <!-- {{ $direct_team->links() }} -->
                       {{ $direct_team->withQueryString()->links() }}
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

