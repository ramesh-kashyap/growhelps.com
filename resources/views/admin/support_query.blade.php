@include('layouts.admin.header')
@include('layouts.admin.sidebar')
 <link rel="stylesheet" href="{{ asset('admin/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Supports Query
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User Profile</a></li>
        <li class="active">dashboard</li>
      </ol>
       <br>
           <form  method="GET" action="{{route('support-query')}}">
                     <div class="form-inline">
                         <div class="form-group">                      
                            <input type="text" Placeholder="Search Users" name="search"  class="form-control" value='{{@$search}}'>
                         </div>
                         <div class="form-group">                      
                           <select name="limit" class="form-control">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>                     
                         </div>
                        
                         <input type="submit" name="submit" class="btn btn-primary btn-sm m-1" value="filter" />
            
                  <a href="{{ route('support-query') }}" name="reset" class="btn btn-primary btn-sm" value="Reset" />Reset</a>
                    </div>
                </form>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
    
     @if(session()->has('message'))
                                        <div class="alert alert-success">
                                        <strong style="color:#006633;">
                                        {{ session()->get('message') }}
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
      <div class="box">
          
            <!-- /.box-header -->
            <div class="box-body">
              <br>
              <div style="overflow-x:auto;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S NO.</th>
                   <th>User ID</th>
                   <th>Ticket Number</th>
                  <th>Category</th>
                  <th>Request Date</th>
                  <th>Closing Date</th>
                  <th>Status</th>
                  <th>View</th>
                  <th>close</th>
                  <th>Reply</th>
                  
                  
                </tr>
                </thead>
                <tbody>
                   <?php if(is_array($level_incomes) || is_object($level_incomes)){ ?>

                <?php $cnt =  $level_incomes->perPage() * ($level_incomes->currentPage() - 1); ?>
                 @foreach($level_incomes as $value)
                  <tr>
                      <td><?= $cnt += 1?></td>
                   
                      <td>{{$value->user_id_fk}}</td>
                    
                      <td>{{$value->ticket_no}}</td>
                      <td>{{$value->category}}</td>
                      <td>{{$value->gen_date}}</td>
                      <td>{{$value->closing_date}}</td>
                      <td><?=($value->status) ? "Closed" : "Open"?></td>
                      
                      <td> <a class="btn btn-primary" href="{{route('get_support_msg')}}?ticket_no=<?=$value->ticket_no?>">View all message</a></td>
                      
                       <td><a class="btn btn-danger" href="{{route('close_ticket_')}}?ticket_no=<?=$value->ticket_no?>">Close Ticket</a></td>
                       
                        <td> <a class="btn btn-success" href="{{route('reply_support_msg')}}?ticket_no=<?=$value->ticket_no?>">Reply Ticket</a></td>
                  
                     
                     
                     
                  </tr>
                  @endforeach

             <?php }?>      
                 

                </tbody>
              </table>

                              <br>
                {{ $level_incomes->links() }}
            </div>
            </div>
            <!-- /.box-body -->
      </div>
      </div>
        </div>
          <!-- /.box -->
   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script src="{{ asset('admin/assets/bower_components/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>


<script>
  
   $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
</script>

@include('layouts.admin.footer')
