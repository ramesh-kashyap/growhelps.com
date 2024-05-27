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
                                <li class="breadcrumb-item active">Club Achievement</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Club Achievement</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
  <h4 class="page-title">Club Achievement</h4>
                        <table id="datatable" class="table table-bordered nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Club</th>
                                    <th>Round</th>
                                    <th>Amount</th>
                                    <th>Multiple</th>
                                    <th>Require Team</th>
                                    <th>Achieve Team </th>
                                    <th>Status</th>
                                    <th>Club Status</th>



                                </tr>
                            </thead>
                            <tbody>

                                <?php                                   
                                      if($first_club>0)
                                      {
                                          $clubstatus="Achieved";
                                         
                                        $clubcolor="rgb(251, 189, 24)";    
                                         
                                          
                                      }
                                      else
                                      {
                                         $clubstatus="Pending";
                                          $clubcolor="none";  
                                      }                                   
                                    ?>
                              <tbody style="background:<?=@$clubcolor?>;color: #000;font-weight: 600;">

                                 <?php
                                 if ($first_club_a_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr >
                                    <td rowspan="7">1<sup>st</sup></td>

                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">1<sup>st</sup></td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">2500</td>

                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">3 & 9</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">27</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">{{$first_club_a_lvl}}</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">{{$status}}</td>
                                    <td rowspan="7"><?=@$clubstatus?></td>


                                </tr> 


                                    <?php
                                 if ($second_club_a_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    

                                    <td>2<sup>nd</sup></td>
                                    <td>5000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$second_club_a_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr> 

                              <?php
                                 if ($third_club_a_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>3<sup>rd</sup></td>
                                    <td>10000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$third_club_a_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>


                                 <?php
                                 if ($four_club_a_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>4<sup>th</sup></td>
                                    <td>20000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$four_club_a_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>

                                 <?php
                                 if ($five_club_a_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>5<sup>th</sup></td>
                                    <td>40000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$five_club_a_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>

                                <?php
                                 if ($six_club_a_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>6<sup>th</sup></td>
                                    <td>80000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$six_club_a_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>
                                <?php
                                 if ($seven_club_a_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>7<sup>th</sup></td>
                                    <td>160000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$seven_club_a_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>
                                

                                </tbody>




                                <!-- 2nd club_b -->
                                  <?php                                   
                                      if($second_club>0)
                                      {
                                          $clubstatus="Achieved";
                                         
                                        $clubcolor="rgb(251, 189, 24)";    
                                         
                                          
                                      }
                                      else
                                      {
                                         $clubstatus="Pending";
                                          $clubcolor="none";  
                                      }                                   
                                    ?>
                              <tbody style="background:<?=@$clubcolor?>;color: #000;font-weight: 600;">

                                 <?php
                                 if ($first_club_b_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr >
                                    <td rowspan="7">2<sup>nd</sup></td>

                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">1<sup>st</sup></td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">5000</td>

                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">3 & 9</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">27</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">{{$first_club_b_lvl}}</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">{{$status}}</td>
                                    <td rowspan="7"><?=@$clubstatus?></td>


                                </tr> 


                                    <?php
                                 if ($second_club_b_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    

                                    <td>2<sup>nd</sup></td>
                                    <td>10000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$second_club_b_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr> 

                              <?php
                                 if ($third_club_b_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>3<sup>rd</sup></td>
                                    <td>20000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$third_club_b_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>


                                 <?php
                                 if ($four_club_b_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>4<sup>th</sup></td>
                                    <td>40000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$four_club_b_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>

                                 <?php
                                 if ($five_club_b_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>5<sup>th</sup></td>
                                    <td>80000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$five_club_b_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>

                                <?php
                                 if ($six_club_b_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>6<sup>th</sup></td>
                                    <td>160000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$six_club_b_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>
                                <?php
                                 if ($seven_club_b_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>7<sup>th</sup></td>
                                    <td>320000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$seven_club_b_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>
                                

                                </tbody>
                                
                       





                                <!-- end 2 club  -->
                                
                       


                                  <!-- 3rd club_c -->
                                  <?php                                   
                                      if($third_club>0)
                                      {
                                          $clubstatus="Achieved";
                                         
                                        $clubcolor="rgb(251, 189, 24)";    
                                         
                                          
                                      }
                                      else
                                      {
                                         $clubstatus="Pending";
                                          $clubcolor="none";  
                                      }                                   
                                    ?>
                              <tbody style="background:<?=@$clubcolor?>;color: #000;font-weight: 600;">

                                 <?php
                                 if ($first_club_c_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr >
                                    <td rowspan="7">3<sup>rd</sup></td>

                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">1<sup>st</sup></td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">10000</td>

                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">3 & 9</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">27</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">{{$first_club_c_lvl}}</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">{{$status}}</td>
                                    <td rowspan="7"><?=@$clubstatus?></td>


                                </tr> 


                                    <?php
                                 if ($second_club_c_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    

                                    <td>2<sup>nd</sup></td>
                                    <td>20000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$second_club_c_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr> 

                              <?php
                                 if ($third_club_c_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>3<sup>rd</sup></td>
                                    <td>40000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$third_club_c_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>


                                 <?php
                                 if ($four_club_c_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>4<sup>th</sup></td>
                                    <td>80000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$four_club_c_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>

                                 <?php
                                 if ($five_club_c_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>5<sup>th</sup></td>
                                    <td>160000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$five_club_c_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>

                                <?php
                                 if ($six_club_c_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>6<sup>th</sup></td>
                                    <td>320000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$six_club_c_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>
                                <?php
                                 if ($seven_club_c_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>7<sup>th</sup></td>
                                    <td>640000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$seven_club_c_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>
                                

                                </tbody>
                                
                       





                                <!-- end 3 club  -->
                                
                       
                                <!-- 4th club_d -->
                                  <?php                                   
                                      if($four_club>0)
                                      {
                                          $clubstatus="Achieved";
                                         
                                        $clubcolor="rgb(251, 189, 24)";    
                                         
                                          
                                      }
                                      else
                                      {
                                         $clubstatus="Pending";
                                          $clubcolor="none";  
                                      }                                   
                                    ?>
                              <tbody style="background:<?=@$clubcolor?>;color: #000;font-weight: 600;">

                                 <?php
                                 if ($first_club_d_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr >
                                    <td rowspan="7">4<sup>th</sup></td>

                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">1<sup>st</sup></td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">20000</td>

                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">3 & 9</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">27</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">{{$first_club_d_lvl}}</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">{{$status}}</td>
                                    <td rowspan="7"><?=@$clubstatus?></td>


                                </tr> 


                                    <?php
                                 if ($second_club_d_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    

                                    <td>2<sup>nd</sup></td>
                                    <td>40000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$second_club_d_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr> 

                              <?php
                                 if ($third_club_d_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>3<sup>rd</sup></td>
                                    <td>80000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$third_club_d_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>


                                 <?php
                                 if ($four_club_d_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>4<sup>th</sup></td>
                                    <td>160000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$four_club_d_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>

                                 <?php
                                 if ($five_club_d_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>5<sup>th</sup></td>
                                    <td>320000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$five_club_d_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>

                                <?php
                                 if ($six_club_d_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>6<sup>th</sup></td>
                                    <td>640000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$six_club_d_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>
                                <?php
                                 if ($seven_club_d_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>7<sup>th</sup></td>
                                    <td>1280000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$seven_club_d_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>
                                

                                </tbody>
                                
                       





                                <!-- end 4 club  -->
                                
                       


                                <!-- 5th club_e -->
                                  <?php                                   
                                      if($five_club>0)
                                      {
                                          $clubstatus="Achieved";
                                         
                                        $clubcolor="rgb(251, 189, 24)";    
                                         
                                          
                                      }
                                      else
                                      {
                                         $clubstatus="Pending";
                                          $clubcolor="none";  
                                      }                                   
                                    ?>
                              <tbody style="background:<?=@$clubcolor?>;color: #000;font-weight: 600;">

                                 <?php
                                 if ($first_club_e_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr >
                                    <td rowspan="7">5<sup>th</sup></td>

                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">1<sup>st</sup></td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">40000</td>

                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">3 & 9</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">27</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">{{$first_club_e_lvl}}</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">{{$status}}</td>
                                    <td rowspan="7"><?=@$clubstatus?></td>


                                </tr> 


                                    <?php
                                 if ($second_club_e_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    

                                    <td>2<sup>nd</sup></td>
                                    <td>80000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$second_club_e_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr> 

                              <?php
                                 if ($third_club_e_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>3<sup>rd</sup></td>
                                    <td>160000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$third_club_e_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>


                                 <?php
                                 if ($four_club_e_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>4<sup>th</sup></td>
                                    <td>320000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$four_club_e_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>

                                 <?php
                                 if ($five_club_e_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>5<sup>th</sup></td>
                                    <td>640000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$five_club_e_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>

                                <?php
                                 if ($six_club_e_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>6<sup>th</sup></td>
                                    <td>1280000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$six_club_e_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>
                                <?php
                                 if ($seven_club_e_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>7<sup>th</sup></td>
                                    <td>2560000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$seven_club_e_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>
                                

                                </tbody>
                                
                       





                                <!-- end 5 club  -->
                                
                       


                                <!-- 6th club_f -->
                                  <?php                                   
                                      if($six_club>0)
                                      {
                                          $clubstatus="Achieved";
                                         
                                        $clubcolor="rgb(251, 189, 24)";    
                                         
                                          
                                      }
                                      else
                                      {
                                         $clubstatus="Pending";
                                          $clubcolor="none";  
                                      }                                   
                                    ?>
                              <tbody style="background:<?=@$clubcolor?>;color: #000;font-weight: 600;">

                                 <?php
                                 if ($first_club_f_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr >
                                    <td rowspan="7">6<sup>th</sup></td>

                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">1<sup>st</sup></td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">80000</td>

                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">3 & 9</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">27</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">{{$first_club_f_lvl}}</td>
                                    <td style="background:<?=@$color?>;color: #000;font-weight: 600;">{{$status}}</td>
                                    <td rowspan="7"><?=@$clubstatus?></td>


                                </tr> 


                                    <?php
                                 if ($second_club_f_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    

                                    <td>2<sup>nd</sup></td>
                                    <td>160000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$second_club_f_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr> 

                              <?php
                                 if ($third_club_f_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>3<sup>rd</sup></td>
                                    <td>320000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$third_club_f_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>


                                 <?php
                                 if ($four_club_f_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>4<sup>th</sup></td>
                                    <td>640000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$four_club_f_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>

                                 <?php
                                 if ($five_club_f_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>5<sup>th</sup></td>
                                    <td>1280000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$five_club_f_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>

                                <?php
                                 if ($six_club_f_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>6<sup>th</sup></td>
                                    <td>256000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$six_club_f_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>
                                <?php
                                 if ($seven_club_f_lvl>=27) 
                                 {
                                    $status="Achieved";
                                         
                                  $color="#74d28c";    
                                 }
                                 else
                                 {
                                      $status="Pending";
                                          $color="#fff";  
                                 }
                                 
                                 ?>
                                <tr style="background:<?=@$color?>;color: #000;font-weight: 600;">
                                    
                                    

                                    <td>7<sup>th</sup></td>
                                    <td>5120000</td>

                                    <td>3 & 9</td>
                                    <td>27</td>
                                    <td>{{$seven_club_f_lvl}}</td>
                                    <td><?=@$status?></td>


                                </tr>
                                

                                </tbody>
                                
                       





                                <!-- end 6 club  -->
                                
                       


                                


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