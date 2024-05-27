@include('layouts.admin.header')
@include('layouts.admin.sidebar')
 <link rel="stylesheet" href="{{ asset('admin/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Payment Ledger
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User Profile</a></li>
        <li class="active">dashboard</li>
      </ol>
       <br>
           <form  method="GET" action="{{route('payments-ledgers')}}">
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
            
                  <a href="{{ route('payments-ledgers') }}" name="reset" class="btn btn-primary btn-sm" value="Reset" />Reset</a>
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
                                                            <th>Sr No</th>
                                                             <th>User ID</th>
                                                             <th>Created At</th>
                                                            <th>Distributor Bonus</th>
                                                            <th>Roi Bonus</th>
                                                     
                                                            <th>Total</th>
                                                            <th>Deduction</th>
                                              
                                                            <th>Payable Amount</th>
                                                           
                                                           
                                                           
                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       <?php if(is_array($direct_incomes) || is_object($direct_incomes)){ ?>

                                                      <?php $cnt =$direct_incomes->perPage() * ($direct_incomes->currentPage() - 1); ?>
                                                       @foreach($direct_incomes as $value)
                                                        <tr>
                                                            <td><?= $cnt += 1?></td>
                                                           
                                                   
                                                           <td>{{$value->user_id_fk}}</td>
                                                           <td>{{$value->ttime}}</td>
                                                            <td>&#8377;  {{$value->distributor_bonus}}</td>
                                                            <td>&#8377;  {{$value->performance_bonus}}</td>
                                                             <td>&#8377;  {{$value->total}}</td>
                                                            <td>&#8377;  {{$value->deduction}}</td>
                                                         
                                                            <td>&#8377;  {{$value->payable_amt}}</td>
                                                           
                                                           
                                                            
                                                           
                                                        </tr>
                                                        @endforeach

                                                   <?php }?>                                                        
                 

                </tbody>
              </table>
                          <br>
              
                  {{ $direct_incomes->withQueryString()->links() }}
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
