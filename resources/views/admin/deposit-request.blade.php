@include('layouts.admin.header')
@include('layouts.admin.sidebar')
 <link rel="stylesheet" href="{{ asset('admin/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Deposit Request
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User Profile</a></li>
        <li class="active">dashboard</li>
      </ol>
       <br>
           <form  method="GET" action="{{route('deposit-request')}}">
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
            
                  <a href="{{ route('deposit-request') }}" name="reset" class="btn btn-primary btn-sm" value="Reset" />Reset</a>
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
                 <div class="row">
                <div class="col-md-4">
                 @if(session()->has('message'))
                    <div class="alert alert-success">
                    <strong style="color:#006633;">
                    {{ session()->get('message') }}
                    </strong>
                    </div>
                    @endif
                    </div>
              </div>
              <br>
              <div style="overflow-x:auto;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S NO.</th>     
                  <th>User Id</th>
                  <th>Amount</th>                  
                   <th>Transaction Date.</th>           
                   <th>Payment Slip.</th>           
                   <th>Transaction ID</th>
                  
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   <?php if(is_array($deposit_list) || is_object($deposit_list)){ ?>

                <?php $cnt = $deposit_list->perPage() * ($deposit_list->currentPage() - 1); ?>
                 @foreach($deposit_list as $value)
                  <tr>
                      <td><?= $cnt += 1?></td>
                   
                      <td>{{$value->user_id_fk}}</td>
                      <td>&#8377; {{$value->amount}}</td>
                      <td>{{$value->created_at}}</td>
                       <td><a target="_blank" href="{{asset('slip/'.$value->slip)}}"><img style="width: 50px;height: 50;" src="{{asset('slip/'.$value->slip)}}"></a></td>
                      <td>{{$value->transaction_id}}</td>
                     
                      <td ><span class="{{($value->status=='Active')?'badge green':'badge red'}}">{{$value->status}}</span></td>   
                         <td><a href="{{asset('deposit_request_done?id=')}}{{$value->id}}&user_Id={{$value->user_id}}&withdraw_status=success" class='btn btn-success'>Success</a> <a href="{{asset('deposit_request_done?id=')}}{{$value->id}}&user_Id={{$value->user_id}}&withdraw_status=blocked" class='btn btn-danger'>Reject</a></td>                 
                  </tr>
                  @endforeach

             <?php }?>      
                </tbody>
              </table>

                <br>
              
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
