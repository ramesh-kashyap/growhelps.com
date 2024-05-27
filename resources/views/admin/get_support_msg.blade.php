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
        
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">

        <br>
             
               <?php if(is_array($open_ticket_msg) || is_object($open_ticket_msg)){ ?>
               <?php $count= 0; ?>
               <?php foreach ($open_ticket_msg as $item): ?>
                  <div class="row">
                     <?php
                      if($item->reply_by == 'user'){
                        echo "<div class='col-md-2 col-sm-2 col-xs-2'></div>";
                      }


                     ?>

                  <div class="col-md-10">
                     <div class="box">
                      <div class="box-body">
                   <!-- /.box-header -->
                     <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose" style="paint-order: 20px; padding-right: 20px;">
                           <h4 class="card-title"><?= $item->category ?> (<?=$item->gen_date?>)</h4>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="row">
                           <div class="col-md-12">
                               <p class="comp_bank_p"><?= $item->msg ?></p><br>
                               <p class="text-right"><?=($item->reply_by == 'admin')? 'Admin' : 'You'?></p>
                           </div>
                        </div>
                     </div>
                   </div>
                  </div>
               </div>
               </div>
               <!-- /.box-body -->
              
          <?php endforeach; ?>
          <?php } ?>

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
