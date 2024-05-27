@include('layouts.admin.header')
@include('layouts.admin.sidebar')

 <link rel="stylesheet" href="{{ asset('admin/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All User List
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User Profile</a></li>
        <li class="active">dashboard</li>
      </ol>
        <br>
           <form  method="GET" action="{{route('alluserlist')}}">
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
            
                  <a href="{{ route('alluserlist') }}" name="reset" class="btn btn-primary btn-sm" value="Reset" />Reset</a>
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
                   <th>User Name</th>
                  <th>User Id</th>
                  <th>Email ID</th>
                  
                   <th>Mobile No.</th>
                   <th>Password</th>
                   <th>Transaction Password</th>
                
                   <th>Joining Date</th>
                   <th>Activation Date</th>
                  
                    <th>Status</th>
                    <!--<th>Action</th>-->
                </tr>
                </thead>
                <tbody>
                   <?php if(is_array($active_user) || is_object($active_user)){ ?>

                <?php $cnt = $active_user->perPage() * ($active_user->currentPage() - 1);?>
                 @foreach($active_user as $value)
                 
                  <tr>
                      <td><?= $cnt += 1?></td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->username}}</td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->phone}}</td>
                      <td>{{$value->PSR}}</td>
                      <td>{{$value->TPSR}}</td>
                  
                      <td>{{$value->created_at}}</td>
                      <td>{{$value->adate}}</td>
                      <td><span class="{{($value->active_status=='Active')?'badge green':'badge red'}}">{{$value->active_status}}</span></td>
                     
                  </tr>
                  @endforeach

             <?php }?>      
                 

                </tbody>
              </table>
                              <br>
                 {{ $active_user->withQueryString()->links() }}
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
