
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Recover Password | Bright Future Group</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
 <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />
</head>
<style type="text/css">
    .bg-primary {
    background-color: #64c5b1!important;
    background: url("{{asset('mainsite/images/map.jpg')}}");
}
</style>
<body class="authentication-bg bg-primary authentication-bg-pattern d-flex align-items-center pb-0 vh-100">

    <div class="home-btn d-none d-sm-block">
        <a href="{{route('Index')}}"><i class="fas fa-home h2 text-white"></i></a>
    </div>

    <div class="account-pages w-100 mt-5 mb-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mb-0">

                        <div class="card-body p-4">

                                <div class="account-box">
                                        <div class="text-center account-logo-box">
                                            <div>
                                                <a href="{{route('Index')}}">
                                                     <img style="    width: 100%;" src="{{asset('mainsite/images/logo2.png')}}" alt="" >
                                                </a>
                                            </div>
                                        </div>
                                        <div class="account-content mt-4">
                                            <div class="text-center">
                                                <p class="text-muted mb-0 mb-3">Enter your Username and we'll send you an email with instructions to reset your password.  </p>
                                            </div>
                                            <form class="form-horizontal" method="POST" action="{{ route('forgot_password_submit') }}">
                                                 @csrf
                                          
                                           @if(session()->has('messages'))
                                        <div class="alert alert-success">
                                        <strong style="color:#006633;">
                                        {{ session()->get('messages') }}
                                        </strong>
                                        </div>
                                        @endif

                                          @if ($errors->any())
                                           <div class="col-xl-12 col-lg-12">
                                          <div class="alert alert-danger" style="background: #cc5850;
    color: #fff;">
                                          <ul>
                                          @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                          @endforeach
                                          </ul>
                                          </div> </div>
                                          @endif
    
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="emailaddress">Username</label>
                                                        <input class="form-control" type="text" id="Username" required="" name="username" placeholder="Username">
                                                    </div>
                                                </div>
    
                                                <div class="form-group row text-center mt-2">
                                                    <div class="col-12">
                                                        <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Reset Password</button>
                                                    </div>
                                                </div>
    
                                            </form>
    
                                            <div class="clearfix"></div>
    
                                            <div class="row mt-4">
                                                <div class="col-sm-12 text-center">
                                                    <p class="text-muted mb-0">Back to <a href="{{route('login')}}" class="text-dark ml-1"><b>Sign In</b></a></p>
                                                </div>
                                            </div>
    
                                        </div>
    
                                    </div>
                                    <!-- end card-box-->
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
    </div>
    <!-- end page -->

      <!-- Vendor js -->
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>

</body>

</html>