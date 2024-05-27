@include('layouts.admin.header')
@include('layouts.admin.sidebar')
 <link rel="stylesheet" href="{{ asset('admin/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Deposit List User
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User Profile</a></li>
        <li class="active">dashboard</li>
      </ol>
       <br>
           <form  method="GET" action="{{route('users-deposit')}}">
                     <div class="form-inline">
                         <div class="form-group">   
                         <label>Search </label>                   
                            <input type="text" Placeholder="Search Users" name="search"  class="form-control" value='{{@$search}}'>
                            <label>Start Date </label>     
                          <input type="date" data-date="" name="start_date"  class="form-control datePicker" data-date-format="YYYY MMMM DD" value="{{@$start_date}}"> 
                           <label>End Date </label>     
                          <input type="date" data-date="" name="end_date" class="form-control datePicker" data-date-format="YYYY MMMM DD" value="{{@$end_date}}">

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
            
                  <a href="{{ route('users-deposit') }}" name="reset" class="btn btn-primary btn-sm" value="Reset" />Reset</a>
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
                 
                  <th>User Id</th>
                  <th>Amount</th>
                  
                   <th>Transaction Date.</th>
                   <th>Payment Mode</th>
                   <th>Transaction ID</th>
                  
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                   <?php if(is_array($deposit_list) || is_object($deposit_list)){ ?>

                <?php $cnt = $deposit_list->perPage() * ($deposit_list->currentPage() - 1); ?>
                 @foreach($deposit_list as $value)
                  <tr>
                      <td><?= $cnt += 1?></td>
                     
                      <td>{{$value->user_id_fk}}</td>
                      <td> {{$value->amount}}</td>
                      <td>{{$value->created_at}}</td>
                      <td>{{$value->transaction_id}}</td>
                      <td>{{$value->payment_mode}}</td>
                     
                      <td ><span class="{{($value->status=='Active')?'badge green':'badge red'}}">{{$value->status}}</span></td>
                     
                  </tr>
                  @endforeach

             <?php }?>      
                 

                </tbody>
              </table>
             {{ $deposit_list->withQueryString()->links() }}
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
  $(document).ready( function() {
    $('.datePicker').val(new Date().toDateInputValue());
});​
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
