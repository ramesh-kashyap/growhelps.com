@include('layouts.admin.header')
@include('layouts.admin.sidebar')
 <link rel="stylesheet" href="{{ asset('admin/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Withdraw History 
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User Profile</a></li>
        <li class="active">dashboard</li>
      </ol>
      <br>
           <form  method="GET" action="{{route('withdraw-history-user')}}">
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
            
                  <a href="{{ route('withdraw-history-user') }}" name="reset" class="btn btn-primary btn-sm" value="Reset" />Reset</a>
                    </div>
                </form>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">

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
                  <th>Request Amount</th>
                
                   <th>Transaction Date.</th>
                  
                   <th>Transaction ID</th>
                   <th>Approved Date</th>
                 
                  
                  
                </tr>
                </thead>
                <tbody>
                   <?php if(is_array($withdraw_request_user) || is_object($withdraw_request_user)){ ?>

                <?php $cnt =  $withdraw_request_user->perPage() * ($withdraw_request_user->currentPage() - 1);  ?>
                 @foreach($withdraw_request_user as $value)
                  <tr>
                      <td><?= $cnt += 1?></td>
           
                      <td>{{$value->user_id_fk}}</td>
                      <td>&#8377; {{$value->amount}}</td>
                     
                      <td>{{$value->created_at}}</td>
                      <td>{{$value->txn_id}}</td>
                      <td>{{$value->paid_date}}</td>
                    
                     
                     
                     
                  </tr>
                  @endforeach

             <?php }?>      
                 

                </tbody>
              </table>
                <br>
               
                 {{ $withdraw_request_user->withQueryString()->links() }}
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
