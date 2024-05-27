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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Support Ticket</a></li>
                                            <li class="breadcrumb-item active">Support Message</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Support Message</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
    
                                        
    <table id="datatable" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <?php if(is_array($open_ticket_msg) || is_object($open_ticket_msg)){ ?>
               <?php $count= 0; ?>
               <?php foreach ($open_ticket_msg as $item): ?>
                                     <?php
                      if($item->reply_by == 'user'){
                        
                      }

                     ?>
  <h5 class="form-header" style=" width: 211px; background:#e92266;padding: 7px;color: #fff;border-radius: 10px;"> <?= $item->category ?> (<?=$item->gen_date?>)</h5>
   
                        <br>

                       <p class="comp_bank_p" style="color:#000" ><?= $item->msg ?></p>
                               <p class="text-right" style="margin-right: 30px;color:#000;margin-left:300px"><?=($item->reply_by == 'admin')? 'Admin' : 'You'?></p>

                                <?php endforeach; ?>
          <?php } ?>
                  
                </table>
                <br>
               
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


