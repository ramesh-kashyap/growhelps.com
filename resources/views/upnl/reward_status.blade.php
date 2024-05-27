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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Achievement</a></li>
                                <li class="breadcrumb-item active">Level Bonus Achievement</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Level Bonus Achievement</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
  <h4 class="page-title">Level Bonus Achievement</h4>
                        <table id="datatable" class="table table-bordered nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Rank</th>
                                    <th>Matching PV</th>
                                    <th>Bonus</th>
                                    <!--<th>Commission</th>-->
                                    <th>Status</th>



                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                     
                                      if($first_lvl>0)
                                      {
                                          $status="Achieved";
                                          if($second_lvl>0)
                                          {
                                           $color="rgb(251, 189, 24)"; $active="";   
                                          }
                                          else
                                          {
                                          $color="#74d28c"; $active="( Active )";
                                          }
                                          
                                      }
                                      else
                                      {
                                         $status="Pending";
                                          $color="none";  
                                      }
                                     
                                    ?>
                                <tr style="background:<?=@$color?>;color: #000;
font-weight: 600;">
                                    <td>1</td>

                                    <td>SILVER</td>
                                    <td>12 PV</td>

                                    <td>COMPANY KIT</td>
                                    <td><?=@$status?></td>


                                </tr>
                                
                                
                                <?php 
                                     
                                      if($second_lvl>0)
                                      {
                                          $status="Achieved";
                                          if($third_lvl>0)
                                          {
                                           $color="rgb(251, 189, 24)";   
                                          }
                                          else
                                          {
                                          $color="#74d28c"; 
                                          }
                                      }
                                      else
                                      {
                                         $status="Pending";
                                          $color="none";  
                                      }
                                     
                                    ?>
                                <tr style="background:<?=@$color?>;color: #000;
font-weight: 600;">
                                    <td>2</td>

                                    <td>SILVER STAR</td>
                                    <td>25 PV</td>

                                    <td>1500/-</td>
                                    <td><?=@$status?> </td>


                                </tr>
                                
                                
                                
                                <?php 
                                     
                                      if($third_lvl>0)
                                      {
                                          $status="Achieved";
                                         if($four_lvl>0)
                                          {
                                           $color="rgb(251, 189, 24)";   
                                          }
                                          else
                                          {
                                          $color="#74d28c"; 
                                          }
                                      }
                                      else
                                      {
                                         $status="Pending";
                                          $color="none";  
                                      }
                                     
                                    ?>
                                <tr style="background:<?=@$color?>;color: #000;
font-weight: 600;">
                                    <td>3</td>

                                    <td>GOLD</td>
                                    <td>50 PV</td>

                                    <td>2500/- </td>
                                    <td><?=@$status?></td>


                                </tr>
                                
                                
                                <?php 
                                     
                                      if($four_lvl>0)
                                      {
                                          $status="Achieved";
                                          if($five_lvl>0)
                                          {
                                           $color="rgb(251, 189, 24)"; ;   
                                          }
                                          else
                                          {
                                          $color="#74d28c"; ;
                                          }
                                      }
                                      else
                                      {
                                         $status="Pending";
                                          $color="none";  
                                      }
                                     
                                    ?>
                                <tr style="background:<?=@$color?>;color: #000;
font-weight: 600;">
                                    <td>4</td>

                                    <td>GOLD STAR</td>
                                    <td>125 PV</td>

                                    <td>5000/-</td>
                                    <td><?=@$status?> </td>


                                </tr>
                                
                                <?php 
                                     
                                      if($five_lvl>0)
                                      {
                                          $status="Achieved";
                                          if($six_lvl>0)
                                          {
                                           $color="rgb(251, 189, 24)";   
                                          }
                                          else
                                          {
                                          $color="#74d28c"; 
                                          }
                                      }
                                      else
                                      {
                                         $status="Pending";
                                          $color="none";  
                                      }
                                     
                                    ?>
                                <tr style="background:<?=@$color?>;color: #000;
font-weight: 600;">
                                    <td>5</td>

                                    <td>PLATINUM</td>
                                    <td>250 PV</td>

                                    <td>10000/-</td>
                                    <td><?=@$status?> </td>


                                </tr>
                                
                                
                                <?php 
                                     
                                      if($six_lvl>0)
                                      {
                                          $status="Achieved";
                                       if($seven_lvl>0)
                                          {
                                           $color="rgb(251, 189, 24)";   
                                          }
                                          else
                                          {
                                          $color="#74d28c";
                                          }
                                      }
                                      else
                                      {
                                         $status="Pending";
                                          $color="none";  
                                      }
                                     
                                    ?>
                                <tr style="background:<?=@$color?>;color: #000;
font-weight: 600;">
                                    <td>6</td>
                                    <td>PLATINUM STAR</td>

                                    <td>600 PV</td>

                                    <td>21000/-</td>
                                    <td><?=@$status?> </td>


                                </tr>
                                
                                
                                <?php 
                                     
                                      if($seven_lvl>0)
                                      {
                                          $status="Achieved";
                                         if($eight_lvl>0)
                                          {
                                           $color="rgb(251, 189, 24)";  
                                          }
                                          else
                                          {
                                          $color="#74d28c"; 
                                          }
                                      }
                                      else
                                      {
                                         $status="Pending";
                                          $color="none";  
                                      }
                                     
                                    ?>
                                <tr style="background:<?=@$color?>;color: #000;
font-weight: 600;">
                                    <td>7</td>

                                    <td> EMERALD</td>
                                    <td>1250 PV</td>

                                    <td> 50000/-</td>
                                    <td><?=@$status?> </td>


                                </tr>
                                
                                
                                <?php 
                                     
                                      if($eight_lvl>0)
                                      {
                                          $status="Achieved";
                                        if($nine_lvl>0)
                                          {
                                           $color="rgb(251, 189, 24)"; 
                                          }
                                          else
                                          {
                                          $color="#74d28c"; 
                                          }
                                      }
                                      else
                                      {
                                         $status="Pending";
                                          $color="none";  
                                      }
                                     
                                    ?>
                                <tr style="background:<?=@$color?>;color: #000;
font-weight: 600;">
                                    <td>8</td>
                                    <td> ROYAL EMERALD</td>

                                    <td> 2500 PV</td>

                                    <td> 1.25 Lakh</td>
                                    <td><?=@$status?></td>


                                </tr>
                                
                                
                                <?php 
                                     
                                      if($nine_lvl>0)
                                      {
                                          $status="Achieved";
                                           if($ten_lvl>0)
                                          {
                                           $color="rgb(251, 189, 24)";  
                                          }
                                          else
                                          {
                                          $color="#74d28c";
                                          }
                                      }
                                      else
                                      {
                                         $status="Pending";
                                          $color="none";  
                                      }
                                     
                                    ?>
                                <tr style="background:<?=@$color?>;color: #000;
font-weight: 600;">
                                    <td>9</td>

                                    <td>TOPAZ</td>
                                    <td>5000 PV</td>

                                    <td> 2.5 Lakh</td>
                                    <td><?=@$status?> </td>


                                </tr>
                                
                                
                                <?php 
                                     
                                      if($ten_lvl>0)
                                      {
                                          $status="Achieved";
                                          $color="#74d28c"; 
                                      }
                                      else
                                      {
                                         $status="Pending";
                                          $color="none";  
                                      }
                                     
                                    ?>
                                <tr style="background:<?=@$color?>;color: #000;
font-weight: 600;">
                                    <td>10</td>
                                    <td>RUBY</td>

                                    <td> 12500 PV</td>

                                    <td> 6 Lakh</td>
                                    <td><?=@$status?> </td>


                                </tr>
                                
                                
 <?php 
                                     
                                      if($eleven_lvl>0)
                                      {
                                          $status="Achieved";
                                          $color="#74d28c"; 
                                      }
                                      else
                                      {
                                         $status="Pending";
                                          $color="none";  
                                      }
                                     
                                    ?>
                                <tr style="background:<?=@$color?>;color: #000;
font-weight: 600;">
                                    <td>11</td>
                                    <td>SAPPHIRE</td>

                                    <td> 30000 PV</td>

                                    <td> 15 Lakh</td>
                                    <td><?=@$status?> </td>


                                </tr>
                                
                                
 <?php 
                                     
                                      if($twel_lvl>0)
                                      {
                                          $status="Achieved";
                                          $color="#74d28c"; 
                                      }
                                      else
                                      {
                                         $status="Pending";
                                          $color="none";  
                                      }
                                     
                                    ?>
                                <tr style="background:<?=@$color?>;color: #000;
font-weight: 600;">
                                    <td>12</td>
                                    <td>DIAMOND</td>

                                    <td> 75000 PV</td>

                                    <td> 35 Lakh</td>
                                    <td><?=@$status?> </td>


                                </tr>
                                
                                
 <?php 
                                     
                                      if($thirdteen_lvl>0)
                                      {
                                          $status="Achieved";
                                          $color="#74d28c"; 
                                      }
                                      else
                                      {
                                         $status="Pending";
                                          $color="none";  
                                      }
                                     
                                    ?>
                                <tr style="background:<?=@$color?>;color: #000;
font-weight: 600;">
                                    <td>13</td>
                                    <td>ROYAL DIAMOND</td>

                                    <td> 200000 PV</td>

                                    <td> 90 Lakh</td>
                                    <td><?=@$status?> </td>


                                </tr>
                                
                                
 <?php 
                                     
                                      if($fourteen_lvl>0)
                                      {
                                          $status="Achieved";
                                          $color="#74d28c"; 
                                      }
                                      else
                                      {
                                         $status="Pending";
                                          $color="none";  
                                      }
                                     
                                    ?>
                                <tr style="background:<?=@$color?>;color: #000;
font-weight: 600;">
                                    <td>14</td>
                                    <td>AMBASSDOR</td>

                                    <td> 500000 PV</td>

                                    <td> 2.15 CR</td>
                                    <td><?=@$status?> </td>


                                </tr>
                                
                                
 <?php 
                                     
                                      if($fiveteen_lvl>0)
                                      {
                                          $status="Achieved";
                                          $color="#74d28c"; 
                                      }
                                      else
                                      {
                                         $status="Pending";
                                          $color="none";  
                                      }
                                     
                                    ?>
                                <tr style="background:<?=@$color?>;color: #000;
font-weight: 600;">
                                    <td>15</td>
                                    <td>CROWN AMBASSDOR</td>

                                    <td> 1125000 PV</td>

                                    <td> 5 CR</td>
                                    <td><?=@$status?> </td>


                                </tr>
                                
                                
 <?php 
                                     
                                      if($sixteen_lvl>0)
                                      {
                                          $status="Achieved";
                                          $color="#74d28c"; 
                                      }
                                      else
                                      {
                                         $status="Pending";
                                          $color="none";  
                                      }
                                     
                                    ?>
                                <tr style="background:<?=@$color?>;color: #000;
font-weight: 600;">
                                    <td>16</td>
                                    <td>BRAND AMBASSDOR</td>

                                    <td> 2500000 PV</td>

                                    <td> 10 CR</td>
                                    <td><?=@$status?> </td>


                                </tr>
                                
                                


                            </tbody>


                        </table>

                    </div>
                </div>
            </div> <!-- end row -->


            <!-- end row -->

        </div> <!-- end container-fluid -->

    </div> <!-- end content -->


    <!--end page-wrapper-->
    <!--start overlay-->
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}">
    </script>