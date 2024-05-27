<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<style>
    .text-white:hover {
        transform: perspective(500px)translateZ(100px);
    }
</style>
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Member</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>

                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard <a href="javascript: void(0);"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </a> </h4>
                    </div>
                </div>
            </div>


            <!-- end page title -->

            <div class="row">


                <!-- end col -->

                <div class="col-xl-4 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom ">
                        <div class="media">
                            <div class="avatar-lg rounded-circle bg-info widget-two-icon align-self-center">
                                <img src="{{asset('assets/images/wallet.png')}}" style="width: 100%;">
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">My
                                    Package</p>
                                <h3 class="font-weight-medium my-2"> <span> &#8377;
                                        {{Auth::user()->investment->sum('amount')}}</span> <span
                                        style="font-size: 12px;"></span></h3>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->


              

                <div class="col-xl-4 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom">
                        <div class="media">
                            <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                <img src="{{asset('assets/images/wallet.png')}}" style="width: 100%;">
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">
                                    ROI BONUS</p>
                                <h3 class="font-weight-medium my-2"><span>&#8377;
                                        {{round(Auth::user()->matching_bonus->sum('amount'),2)}}</span> <span
                                        style="font-size: 12px;"></span></h3>

                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-xl-4 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom ">
                        <div class="media">
                            <div class="avatar-lg rounded-circle btn-success widget-two-icon align-self-center">
                                <i class=" fas fa-user-injured avatar-title font-30 text-white"></i>
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Direct
                                    Team</p>
                                <h4 class="font-weight-medium my-2" style="text-transform: capitalize;"><span>
                                        {{($user_direct)?$user_direct:0}}</span> <span style="font-size: 12px;"></span>
                                </h4>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
        


              

            </div>
            <!-- end row -->
            <div class="row">


        <div class="col-xl-4 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom ">
                        <div class="media">
                            <div class="avatar-lg rounded-circle btn-success widget-two-icon align-self-center">
                                <i class=" fas fa-user-injured avatar-title font-30 text-white"></i>
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">
                                    DOWNLINE</p>
                                <h4 class="font-weight-medium my-2" style="text-transform: capitalize;"><span>
                                        {{($total_team)?$total_team:0}}</span> <span style="font-size: 12px;"></span>
                                </h4>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->


                <div class="col-xl-4 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom ">
                        <div class="media">
                            <div class="avatar-lg rounded-circle btn-pinterest widget-two-icon align-self-center">
                                <img src="{{asset('assets/images/wallet.png')}}" style="width: 100%;">
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">
                                    Withdrawn</p>
                                <h3 class="font-weight-medium my-2">
                                    <span>&#8377; {{Auth::user()->withdraw->sum('amount')}}</span> <span
                                        style="font-size: 12px;"></span>
                                </h3>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom ">
                        <div class="media">
                            <div class="avatar-lg rounded-circle btn-pinterest widget-two-icon align-self-center">
                                <img src="{{asset('assets/images/wallet.png')}}" style="width: 100%;">
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">
                                    AVAILABLE BALANCE</p>
                                <h3 class="font-weight-medium my-2">
                                    <span>&#8377; {{round(Auth::user()->available_balance(),2)}}</span> <span
                                        style="font-size: 12px;"></span>
                                </h3>

                            </div>
                        </div>
                    </div>
                </div>




            </div>

            <!-- end row -->


            <div class="row">




                <!-- {{!! QrCode::size(250)->generate('Online Web Tutor'); !!}} -->


                <style type="text/css">
                    svg {
                        overflow: hidden;
                        vertical-align: middle;
                        width: 100px;
                        height: 115px;
                    }
                </style>
                <style>
                    #customers {
                        font-family: Arial, Helvetica, sans-serif;
                        border-collapse: collapse;

                    }

                    #customers td,
                    #customers th {
                        border: 1px solid #ddd;
                        padding: 8px;
                        color: #000;
                    }

                    #customers tr:nth-child(even) {
                        background-color: #f2f2f2;
                    }

                    #customers tr:hover {
                        background-color: #ddd;
                    }

                    #customers th {
                        padding-top: 12px;
                        padding-bottom: 12px;
                        text-align: left;
                        background-color: #4CAF50;
                        color: white;
                    }
                </style>
            </div>

            <!-- end row -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card-box ribbon-box">
                        <div class="ribbon ribbon-warning">Referral Links</div>
                        <p class="mb-0">

                            <?php $qrCode=asset('').'register?ref='.Auth::user()->username;?>

                            <input type="text" class="form-control inputvl"
                                value="{{asset('')}}register?ref={{Auth::user()->username}}" id="inputLeft"
                                readonly="readonly" name="">
                         
                            <button type="button" style=""
                                class="btn btn-outline-primary waves-effect width-md waves-light btncopy"
                                onclick="copyToclip('inputLeft')">Copy Link</button>
                        </p>
                    </div>
                </div>

              
            </div>
            <style type="text/css">
                .inputvl {
                    width: 70%;
                    float: left;
                }

                .btncopy {
                    margin-left: 20px;
                    font-weight: bold;
                }

                <blade media|%20only%20screen%20and%20(max-width%3A%20600px)%20%7B>.inputvl {
                    width: 100%;
                    float: left;
                }

                .btncopy {
                    margin-left: 10px;
                    font-weight: bold;
                    /*margin-top: 20px;*/
                }
                }
            </style>
            <script type="text/javascript">
                function copyToclip(inputID) {

                    var copyText = document.getElementById(inputID);

                    copyText.select();

                    document.execCommand("copy");

                    $.toaster('Link Copied');

                }
            </script>
            <!--- end row -->

        </div> <!-- end container-fluid -->

    </div> <!-- end content -->