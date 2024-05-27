@include('layouts.upnl.header')
<style type="text/css">
    .tree-border::before {
        display: block;
        width: 50%;
        margin-left: 25%;
        margin-right: 25%;
        border-top: 2px solid #5883b7;
        border-radius: 100px;
        color: #2D2A03;
        content: "|";
    }
/*Om code start*/
.data-table td span:nth-child(3n - 1){cursor:pointer !important; color:#1e53c9 !important; font-weight:400 !important; padding:6px 6px 4px 6px;} 
.load-gif img{ width:120px;}
.load-gif{width:20px !important;}
.load-gif img{ width:20px !important; float:left;}
.system-cal-report{ font-size:12px; color:red;}

#userDataModal #userName{ text-transform:uppercase;}
#userData table{ width:100%; border:1px #ccc solid; background-color:#000;}
#userData table td{ border:1px #ccc solid; padding:8px; text-transform:uppercase; color:#fff; text-align:center;}
#userData table td i{ margin-right:4px;}
#userData table td span{ float:center; font-weight:100px; font-size:12px;}
</style>
<input type="hidden" name="base_url" value="{{asset('')}}">
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">My Network</a></li>
                                            <li class="breadcrumb-item active">Genealogy Tree</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Genealogy Tree</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
<!-- 

                    <form action="{{ route('User-tree') }}" method="GET">
             <div class="form-inline">
                 
                 <div class="form-group">                      
                   <input type="text" Placeholder="Search Users" name="search"  class="form-control" value='{{@$search}}'>              
                 </div> &nbsp;&nbsp;&nbsp;
                  <div class="form-group">                      
                  <select name="limit" class="form-control">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>              
                 </div> 
                 <input type="submit" name="submit" class="btn btn-primary m-1 btn-sm" value="Search" />
         <a href="{{ route('User-tree') }}" name="reset" class="btn btn-primary btn-sm" value="Reset" />Reset</a>
            </div>
        </form>
        <br> -->
    <table class="data-table" style="width:100%;">
                                    <tbody>
                                        <tr class="text-center">
                                            <td colspan="8">
                                                <h3 class="text-center"><strong>MY STRUCTURE</strong></h3>
                                            </td>
                                        </tr>
                                        <tr class="text-center">
                                            <td colspan="8" style="border-color:White; background-color:White;"
                                                class="text-center">Downline ID -&gt;
                                                <form method="get" action="{{route('User-tree')}}">
                                                    <input name="suser" type="text" id="suser">
                                                    <input type="submit" name="submit" value="Search" id="submit">
                                                   
                                                </form>

                                                <br>
                                                <span id="ctl00_ContentPlaceHolder1_lblerror"></span></td>
                                        </tr>
                                        <?php
                    $status = @$mydata->active_status;
                    if ($status!="")
                     {
                     
                    if ($status == "Active" || $status == "Block")
                      {
                      $color = "icon-member-active";
                      }
                    elseif ($status == "Pending"  ||  $status == 'Inactive')
                      {
                      $color = "icon-member-pending";
                      }
                     else
                      {
                        $color = "empty";
                      }
                         # code...
                    }else
                    {
                      $color = "empty";  
                    }
                ?>
                                        <tr class="text-center">
                                            <td colspan="8" style="border-color:White; background-color:White;"
                                                class="text-center">
                                                <input type="image" name="ctl00$ContentPlaceHolder1$ImageButton0"
                                                    id="ctl00_ContentPlaceHolder1_ImageButton0" data-toggle="tooltip"
                                                    title='' data-html="true" OnClick="javascript:void(0)"
                                                    data-toggle="tooltip" data-html="true" data-trigger="hover" title=""
                                                    data-placement="bottom" data-original-title=""
                                                    src="{{asset('assets/images/')}}/{{$color}}.png"
                                                    style="border-width: 0px; width: 78px; height: 59px; background: white;">
                                                <br>
                                                <span id="ctl00_ContentPlaceHolder1_Label0" style=" font-weight: 700">
                                                    <?=@$mydata->name?strtoupper(@$mydata->name):""?>
                                                </span> <br>
                                                <span id="ctl00_ContentPlaceHolder1_Label7">
                                                    <?=@$mydata->username?strtoupper(@$mydata->username):""?>
                                                </span></td>
                                        </tr>
                                        <tr class="text-center">
                                            <td colspan="8" style="border-color:White; background-color:White;"
                                                class="text-center">
                                                <div class="tree-border"></div>
                                            </td>
                                        </tr>
                                        <?php
                    $status = @$childs_1->active_status;
              if ($status!="")
                     {
                     
                    if ($status == "Active" || $status == "Block")
                      {
                      $color = "icon-member-active";
                      }
                    elseif ($status == "Pending"  ||  $status == 'Inactive')
                      {
                      $color = "icon-member-pending";
                      }
                     else
                      {
                        $color = "empty";
                      }
                         # code...
                    }else
                    {
                      $color = "empty";  
                    }

                ?>
                                        <tr class="text-center">
                                            <td colspan="4" style="border-color:White; background-color:White;"
                                                class="text-center"><a
                                                    href="{{route('User-tree')}}?user_id={{@$childs_1->username}}">

                                                    <input type="image" name="ctl00$ContentPlaceHolder1$ImageButton1"
                                                        id="ctl00_ContentPlaceHolder1_ImageButton1"
                                                        data-toggle="tooltip" title='' data-html="true"
                                                        href="{{route('User-tree')}}?user_id={{@$childs_1->username}}"
                                                        data-toggle="tooltip" data-html="true" data-trigger="hover"
                                                        title="" data-placement="bottom" data-original-title=""
                                                        src="{{asset('assets/images/')}}/{{$color}}.png"
                                                        style="border-width: 0px;width: 78px;height: 59px;background: white;"
                                                        userName="<?=@$childs_1[0]['name']?strtoupper(@$childs_1[0]['name']):""?>">
                                                </a> <br>
                                                <span id="ctl00_ContentPlaceHolder1_Label1" style=" font-weight: 700">
                                                    <?=@$childs_1->name?strtoupper(@$childs_1->name):""?>
                                                </span><br>
                                                <span id="ctl00_ContentPlaceHolder1_Label8">

                                                    <?=@$childs_1->username?strtoupper(@$childs_1->username):""?>
                                                </span></td>
                                            <?php
                    $status = @$childs_2->active_status;
                     if ($status!="")
                     {
                     
                    if ($status == "Active" || $status == "Block")
                      {
                      $color = "icon-member-active";
                      }
                    elseif ($status == "Pending"  ||  $status == 'Inactive')
                      {
                      $color = "icon-member-pending";
                      }
                     else
                      {
                        $color = "empty";
                      }
                         # code...
                    }else
                    {
                      $color = "empty";  
                    }
                ?>
                                            <td colspan="4" style="border-color:White; background-color:White;"
                                                class="text-center"><a
                                                    href="{{route('User-tree')}}?user_id={{@$childs_2->username}}">
                                                    <input type="image" name="ctl00$ContentPlaceHolder1$ImageButton2"
                                                        id="ctl00_ContentPlaceHolder1_ImageButton2"
                                                        data-toggle="tooltip" title='' data-html="true"
                                                        href="{{route('User-tree')}}?user_id={{@$childs_2->username}}e"
                                                        data-toggle="tooltip" data-html="true" data-trigger="hover"
                                                        title="" data-placement="bottom" data-original-title=""
                                                        src="{{asset('assets/images/')}}/{{$color}}.png" style="border-width: 0px;
        width: 78px;
        height: 59px;
        background: white;
       ">
                                                </a> <br>
                                                <span id="ctl00_ContentPlaceHolder1_Label2" style=" font-weight: 700">
                                                    <?=@$childs_2->name?strtoupper(@$childs_2->name):""?>
                                                </span><br>
                                                <span id="ctl00_ContentPlaceHolder1_Label9">
                                                    <?=@$childs_2->username?strtoupper(@$childs_2->username):""?>
                                                </span></td>
                                        </tr>
                                        <tr class="text-center">
                                            <td colspan="4" style="border-color:White; background-color:White;"
                                                class="text-center">
                                                <div class="tree-border"></div>
                                            </td>
                                            <td colspan="4" style="border-color:White; background-color:White;"
                                                class="text-center">
                                                <div class="tree-border"></div>
                                            </td>
                                        </tr>
                                        <?php
                    
                    $status = @$childs_3->active_status;
                    if ($status!="")
                     {
                     
                    if ($status == "Active" || $status == "Block")
                      {
                      $color = "icon-member-active";
                      }
                    elseif ($status == "Pending"  ||  $status == 'Inactive')
                      {
                      $color = "icon-member-pending";
                      }
                     else
                      {
                        $color = "empty";
                      }
                         # code...
                    }else
                    {
                      $color = "empty";  
                    }
                ?>
                                        <tr class="text-center">
                                            <td colspan="2" style="border-color:White; background-color:White;"
                                                class="text-center"><a
                                                    href="{{route('User-tree')}}?user_id={{@$childs_3->username}}">
                                                    <input type="image" name="ctl00$ContentPlaceHolder1$ImageButton3"
                                                        id="ctl00_ContentPlaceHolder1_ImageButton3"
                                                        data-toggle="tooltip" title='' data-html="true"
                                                        data-toggle="tooltip" data-html="true" data-trigger="hover"
                                                        title="" data-placement="bottom" data-original-title=""
                                                        src="{{asset('assets/images/')}}/{{$color}}.png" style="border-width: 0px;
        width: 78px;
        height: 59px;
        background: white;
       ">
                                                </a> <br>
                                                <span id="ctl00_ContentPlaceHolder1_Label3" style=" font-weight: 700">
                                                    <?=@$childs_3->name?strtoupper(@$childs_3->name):""?>
                                                </span><br>
                                                <span id="ctl00_ContentPlaceHolder1_Label10">
                                                    <?=@$childs_3->username?strtoupper(@$childs_3->username):""?>
                                                </span></td>
                                            <?php
                    
                    $status = @$childs_4->active_status;
                    if ($status!="")
                     {
                     
                    if ($status == "Active" || $status == "Block")
                      {
                      $color = "icon-member-active";
                      }
                    elseif ($status == "Pending"  ||  $status == 'Inactive')
                      {
                      $color = "icon-member-pending";
                      }
                     else
                      {
                        $color = "empty";
                      }
                         # code...
                    }else
                    {
                      $color = "empty";  
                    }
                ?>
                                            <td colspan="2" style="border-color:White; background-color:White;"
                                                class="text-center"><a
                                                    href="{{route('User-tree')}}?user_id={{@$childs_4->username}}">
                                                    <input type="image" name="ctl00$ContentPlaceHolder1$ImageButton4"
                                                        id="ctl00_ContentPlaceHolder1_ImageButton4"
                                                        data-toggle="tooltip" title='' data-html="true"
                                                        href="{{route('User-tree')}}?user_id={{@$childs_4->username}}"
                                                        data-toggle="tooltip" data-html="true" data-trigger="hover"
                                                        title="" data-placement="bottom" data-original-title=""
                                                        src="{{asset('assets/images/')}}/{{$color}}.png" style="border-width: 0px;
        width: 78px;
        height: 59px;
        background: white;
       ">
                                                </a> <br>
                                                <span id="ctl00_ContentPlaceHolder1_Label4" style=" font-weight: 700">
                                                    <?=@$childs_4->name?strtoupper(@$childs_4->name):""?>
                                                </span><br>
                                                <span id="ctl00_ContentPlaceHolder1_Label11">
                                                    <?=@$childs_4->username?strtoupper(@$childs_4->username):""?>
                                                </span></td>
                                            <?php
                    
                    $status = @$childs_5->active_status;
                    if ($status!="")
                     {
                     
                    if ($status == "Active" || $status == "Block")
                      {
                      $color = "icon-member-active";
                      }
                    elseif ($status == "Pending"  ||  $status == 'Inactive')
                      {
                      $color = "icon-member-pending";
                      }
                     else
                      {
                        $color = "empty";
                      }
                         # code...
                    }else
                    {
                      $color = "empty";  
                    }
                ?>
                                            <td colspan="2" style="border-color:White; background-color:White;"
                                                class="text-center"><a
                                                    href="{{route('User-tree')}}?user_id={{@$childs_5->username}}">
                                                    <input type="image" name="ctl00$ContentPlaceHolder1$ImageButton5"
                                                        id="ctl00_ContentPlaceHolder1_ImageButton5"
                                                        src="{{asset('assets/images/')}}/{{$color}}.png" data-toggle="tooltip"
                                                        title='' data-html="true"
                                                        href="{{route('User-tree')}}?user_id={{@$childs_5->username}}"
                                                        data-toggle="tooltip" data-html="true" data-trigger="hover"
                                                        title="" data-placement="bottom" data-original-title="" style="border-width: 0px;
        width: 78px;
        height: 59px;
        background: white;
       ">
                                                </a> <br>
                                                <span id="ctl00_ContentPlaceHolder1_Label5" style=" font-weight: 700">
                                                    <?=@$childs_5->name?strtoupper(@$childs_5->name):""?>
                                                </span><br>
                                                <span id="ctl00_ContentPlaceHolder1_Label12">
                                                    <?=@$childs_5->username?strtoupper(@$childs_5->username):""?>
                                                </span></td>
                                            <?php
                    $status = @$childs_6->active_status;
                     if ($status!="")
                     {
                     
                    if ($status == "Active" || $status == "Block")
                      {
                      $color = "icon-member-active";
                      }
                    elseif ($status == "Pending"  ||  $status == 'Inactive')
                      {
                      $color = "icon-member-pending";
                      }
                     else
                      {
                        $color = "empty";
                      }
                         # code...
                    }else
                    {
                      $color = "empty";  
                    }
                ?>
                                            <td colspan="2" style="border-color:White; background-color:White;"
                                                class="text-center"><a
                                                    href="{{route('User-tree')}}?user_id={{@$childs_6->username}}">
                                                    <input type="image" name="ctl00$ContentPlaceHolder1$ImageButton6"
                                                        id="ctl00_ContentPlaceHolder1_ImageButton6"
                                                        data-toggle="tooltip" title='' data-html="true"
                                                        data-toggle="tooltip" data-html="true" data-trigger="hover"
                                                        title="" data-placement="bottom" data-original-title=""
                                                        src="{{asset('assets/images/')}}/{{$color}}.png" style="border-width: 0px;
        width: 78px;
        height: 59px;
        background: white;
       ">
                                                </a> <br>
                                                <span id="ctl00_ContentPlaceHolder1_Label6" style=" font-weight: 700">
                                                    <?=@$childs_6->name?strtoupper(@$childs_6->name):""?>
                                                </span><br>
                                                <span id="ctl00_ContentPlaceHolder1_Label13">
                                                    <?=@$childs_6->username?strtoupper(@$childs_6->username):""?>
                                                </span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                       
                                    </div>
                                </div>
                            </div> <!-- end row -->
    
    
                            <!-- end row -->
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

<div id="userDataRes">
<!-- Modal -->
<div class="modal fade" id="userDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userName"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="userData"><span class="load-gif"><img style="width: 100%;" src="{{asset('assets/images/load.gif')}}"> System calculating reports</span></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

    <!--end page-wrapper-->
    <!--start overlay-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('assets/js/om_all_function.js')}}"></script>
@include('layouts.upnl.footer')


