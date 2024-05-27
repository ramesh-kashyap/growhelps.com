<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- SITE TITLE -->
<title>Grow Hepls || Registration</title>
<!--<base href="https://helpingpromo.com/" src="https://helpingpromo.com/" />-->
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="{{asset('')}}mainsite/assets/images/logo_dark.png">
<!-- Animation CSS -->
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/css/animate{{asset('')}}" >        
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/bootstrap/css/bootstrap.min.css">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/css/ionicons.min.css">
<!--- owl carousel CSS-->
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/owlcarousel/css/owl.theme.css">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/css/magnific-popup.css">
<!-- Style CSS -->
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/css/style.css">
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/css/responsive.css">
<link id="layoutstyle" rel="stylesheet" href="assets/color/theme.css">
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/css/custom.css">
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/css/responsive-clone.css">
<script type='text/javascript'>
function refreshCaptcha(){
    var img = document.images['captchaimg'];
    img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
</head>
<body class="v_light" data-spy="scroll" data-offset="110">



<div class="divider small_divider"></div>
<div class="customer-wrapper">
    <div class="container">
        <div class="customer-logo text-center animation" data-animation="fadeInUp" data-animation-delay="0.2s">
            <a href='{{asset('')}}home'><img height="150" src="{{asset('')}}mainsite/assets/images/logo_dark.png"></a>
        </div>
        <div class="customer-form">
                   

 <script language=javascript>
 function checkform() {
   document.getElementById('error').style.display = "none";
   var myNode = document.getElementById("error");
   myNode.innerHTML = '';
  if (document.regform.fullname.value == '') { 
    
    var div = document.getElementById('error');
    div.innerHTML = div.innerHTML + '<p>Please enter your full name!</p>';
    document.getElementById('error').style.display = "block";
    document.regform.fullname.focus();
    return false;
  }
 
  
  if (document.regform.username.value == '') {
    var div = document.getElementById('error');
    div.innerHTML = div.innerHTML + '<p>Please enter your username!</p>';
    document.getElementById('error').style.display = "block";
    document.regform.username.focus();
    return false;
  }
  if (!document.regform.username.value.match(/^[A-Za-z0-9_\-]+$/)) {
    var div = document.getElementById('error');
    div.innerHTML = div.innerHTML + '<p>For username you should use English letters and digits only!</p>';
    document.getElementById('error').style.display = "block";
    document.regform.username.focus();
    return false;
  }
  if (document.regform.password.value == '') {
    var div = document.getElementById('error');
    div.innerHTML = div.innerHTML + '<p>Please enter your password!</p>';
    document.getElementById('error').style.display = "block";
    document.regform.password.focus();
    return false;
  }
  if (document.regform.password.value != document.regform.password2.value) {
    var div = document.getElementById('error');
    div.innerHTML = div.innerHTML + '<p>Please check your password! Password Mismatch</p>';
    document.getElementById('error').style.display = "block";
    document.regform.password2.focus();
    return false;
  }
 
  
  if (document.regform.email.value == '') {
    var div = document.getElementById('error');
    div.innerHTML = div.innerHTML + '<p>Please enter your e-mail address!</p>';
    document.getElementById('error').style.display = "block";
    document.regform.email.focus();
    return false;
  }
  if (document.regform.email.value != document.regform.email1.value) {
    var div = document.getElementById('error');
    div.innerHTML = div.innerHTML + '<p>Please retupe your e-mail!</p>';
    document.getElementById('error').style.display = "block";
    document.regform.email.focus();
    return false;
  }

  for (i in document.regform.elements) {
    f = document.regform.elements[i];
    if (f.name && f.name.match(/^pay_account/)) {
      if (f.value == '') continue;
      var notice = f.getAttribute('data-validate-notice');
      var invalid = 0;
      if (f.getAttribute('data-validate') == 'regexp') {
        var re = new RegExp(f.getAttribute('data-validate-regexp'));
        if (!f.value.match(re)) {
          invalid = 1;
        }
      } else if (f.getAttribute('data-validate') == 'email') {
        var re = /^[^\@]+\@[^\@]+\.\w{2,4}$/;
        if (!f.value.match(re)) {
          invalid = 1;
        }
      }
      if (invalid) {
        alert('Invalid account format. Expected '+notice);
        f.focus();
        return false;
      }
    }
  }

  if (document.regform.agree.checked == false) {
    var div = document.getElementById('error');
    div.innerHTML = div.innerHTML + '<p>You have to agree with the Terms and Conditions!</p>';
    document.getElementById('error').style.display = "block";
    return false;
  }

  return true;
 }

 function IsNumeric(sText) {
  var ValidChars = "0123456789";
  var IsNumber=true;
  var Char;
  if (sText == '') return false;
  for (i = 0; i < sText.length && IsNumber == true; i++) { 
    Char = sText.charAt(i); 
    if (ValidChars.indexOf(Char) == -1) {
      IsNumber = false;
    }
  }
  return IsNumber;
 }
 </script>
 
  
            <div class="form-container">
                 <font style="color: red;"></font> 
                <div class="customer-form-heading animation" data-animation="fadeInUp" data-animation-delay="0.3s">
                    <h2>Create a New Account</h2>
                    <p>Join now with Grow Helps by just filling the below given form</p>
                </div>
                <form name="frmsubmit" id="theform"  method="POST"
                        action="{{route('registers')}}">
                        {{ csrf_field() }}

                                
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                
                    <div id="error" style="display:none;" class="alert alert-danger text-left"></div>
                    <ul class="row form-list animation" data-animation="fadeInUp" data-animation-delay="0.4s">
                    
                    
                    

 <ul class="row form-list animation" data-animation="fadeInUp" data-animation-delay="0.4s">
     
      {{ csrf_field() }}
                    @php
                    $sponsor = @$_GET['ref'];
                    $name = \App\User::where('username', $sponsor)->first();
                    @endphp
                        <li class="col-md-6">
                            <div class="input-box">
                                <div class="iconed">
                                    <span class="icon"><img src="{{asset('')}}mainsite/assets/images/user.png"></span>
                                    <input type="text" name="sponsor" placeholder="Sponsor ID" value="{{($sponsor)?$sponsor:""}}" data-response="sponsor_res"  class="form-control check_sponsor_exist">
                                      <span id="sponsor_res"><?=($name)?$name->name:"";?></span>
                                </div>
                            </div>
                        </li>
						<li class="col-md-6">
							<div class="input-box">
								<div class="iconed">
                                <span class="icon"><img src="{{asset('')}}mainsite/assets/images/user.png"></span>
                                    <input type="text" name="name" placeholder="Your Full Name" value="" class="form-control">
								</div>
							</div>
						</li>
                        <li class="col-md-6">
							<div class="input-box">
								<div class="iconed">
                                <span class="icon"><img src="{{asset('')}}mainsite/assets/images/email.png"></span>
                                        <input type="text" name="email" placeholder="Your Email ID" value="" class="form-control">
								</div>
							</div>
						</li>
                       
							<li class="col-md-6">
							<div class="input-box">
								<div class="iconed">
                                <span class="icon"><img src="{{asset('')}}mainsite/assets/images/clock.png"></span>
                                    <input type="text" name="phone" placeholder="Mobile No" value="" class="form-control">
								</div>
							</div>
						</li>
                       
							<li class="col-md-6">
							<div class="input-box">
								<div class="iconed">
                                <span class="icon"><img src="{{asset('')}}mainsite/assets/images/lock.png"></span>
                                    <input type="password" name="password" id="password" placeholder="Password" value="" class="form-control">
								</div>
							</div>
						</li>
                       
							<li class="col-md-6">
							<div class="input-box">
								<div class="iconed">
                                <span class="icon"><img src="{{asset('')}}mainsite/assets/images/lock.png"></span>
                                    <input type="password" name="password_confirmation" id="phone" placeholder="Confirmation Password" value="" class="form-control">
								</div>
							</div>
						</li>

                  	<li class="col-md-6">
							<div class="input-box">
								<div class="iconed">
                                <span class="icon"><img src="{{asset('')}}mainsite/assets/images/user.png"></span>
                                    <input type="text" name="account_holder" id="phone" placeholder="Account Holder" value="" class="form-control">
								</div>
							</div>
						</li>



  	<li class="col-md-6">
							<div class="input-box">
								<div class="iconed">
                                <span class="icon"><img src="{{asset('')}}mainsite/assets/images/clock.png"></span>
                                    <input type="text" name="bank_name" id="phone" placeholder="Bank Name" value="" class="form-control">
								</div>
							</div>
						</li>



                   	<li class="col-md-6">
							<div class="input-box">
								<div class="iconed">
                                <span class="icon"><img src="{{asset('')}}mainsite/assets/images/user.png"></span>
                                    <input type="text" name="branch_name" id="phone" placeholder="Branch Name" value="" class="form-control">
								</div>
							</div>
						</li>






                   	<li class="col-md-6">
							<div class="input-box">
								<div class="iconed">
                                <span class="icon"><img src="{{asset('')}}mainsite/assets/images/clock.png"></span>
                                    <input type="number" name="account_number" id="phone" placeholder="Account Number" value="" class="form-control">
								</div>
							</div>
						</li>

 	<li class="col-md-6">
							<div class="input-box">
								<div class="iconed">
                                <span class="icon"><img src="{{asset('')}}mainsite/assets/images/user.png"></span>
                                    <input type="text" name="ifsc_code" id="phone" placeholder="Ifsc Code" value="" class="form-control">
								</div>
							</div>
						</li>

















							

                    
                       
                        <!--<li>-->
                        <!--  <div class="input-box">-->
                        <!--  <img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>-->
                        <!--  <div class="iconed">-->
                        <!--  <span class="icon"><img src="assets/images/key.png"></span>-->
                        <!--    <input id="captcha_code" name="captcha_code" placeholder="Enter the code above here" type="text" class="form-control">-->
                        <!--    </div>-->
                        <!--    <br>-->
                        <!--    Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.-->
                            
                        <!--  </div>    -->
                        <!--</li>-->
                                                <li class="col-md-12 accept-terms">
                            <div class="input-box radio">
                                <input type="checkbox" id="tc" name="agree" value="1" checked>
                                <label for="tc">I have read and agreed with Grow Helps terms and conditions</a></label>
                            </div>
                        </li>
                                                                                                <li class="col-md-12 text-center">
                            <button class="btn btn-default submit-btn"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>Submit</button>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="bottom-line text-center">
                <p style="font-size:15px;">Already have an Account?  <a href="{{route('login')}}">Sign In</a></p>
            </div>
                    </div>
    </div>
</div>

  <script src="https://code.jquery.com//jquery-3.3.1.min.js"></script>
  <script>

      $('.check_sponsor_exist').keyup(function(e) {
          var ths = $(this);
          var res_area = $(ths).attr('data-response');
          var sponsor = $(this).val();
          // alert(sponsor); 
          $.ajax({
              type: "POST"
              , url: "{{ route('getUserName') }}"
              , data: {
                  "user_id": sponsor
                  , "_token": "{{ csrf_token() }}"
              , }
              , success: function(response) {
                  // alert(response);      
                  if (response != 1) {
                      // alert("hh");
                      $(".submit-btn").prop("disabled", false);
                      $('#' + res_area).html(response).css('color', '#000').css('font-weight', '800')
                          .css('margin-buttom', '10px');
                  } else {
                      // alert("hi");
                      $(".submit-btn").prop("disabled", true);
                      $('#' + res_area).html("Sponsor ID Not exists!").css('color', 'red').css(
                          'margin-buttom', '10px');
                  }
              }
          });
      });

  </script>
  
<div class="divider small_divider"></div>
<!-- Latest jQuery --> 
<script src="{{asset('')}}mainsite/assets/js/jquery-1.12.4.min.js"></script> 
<!-- Latest compiled and minified Bootstrap --> 
<script src="{{asset('')}}mainsite/assets/bootstrap/js/bootstrap.min.js"></script> 
<!-- owl-carousel min js  --> 
<script src="{{asset('')}}mainsite/assets/owlcarousel/js/owl.carousel.min.js"></script> 
<!-- magnific-popup min js  --> 
<script src="{{asset('')}}mainsite/assets/js/magnific-popup.min.js"></script> 
<!-- waypoints min js  --> 
<script src="{{asset('')}}mainsite/assets/js/waypoints.min.js"></script> 
<!-- parallax js  --> 
<script src="{{asset('')}}mainsite/assets/js/parallax.js"></script> 
<!-- countdown js  --> 
<script src="{{asset('')}}mainsite/assets/js/jquery.countdown.min.js"></script> 
<!-- particles min js  --> 
<script src="{{asset('')}}mainsite/assets/js/particles.min.js"></script>
<!-- scripts js --> 
<script src="{{asset('')}}mainsite/assets/js/scripts.js"></script>
<script type="text/javascript">
            $("#sponsor").keyup(function(){
                $.ajax({
                    url:'getsp.php',
                    method:'post',
                    data: JSON.stringify({name:$(this).val()}),
                    success:function(data){
                         if(JSON.parse(data).status == "true")
                         {
                            $("#fetchFullname").css('color','orange');
                         }
                         else
                         {
                            $("#fetchFullname").css('color','orange');
                         }
                         $("#fetchFullname").html(JSON.parse(data).message);
                    }
                })
            })
            
            $("#otpbtn").on('click', function (){
                
                $.ajax({
                    url:'sendotp.php',
                    method:'post',
                    data: JSON.stringify({phone:$("#phone").val()}),
                    success:function(data){
                         
                         $("#otpmessage").css('color','orange');
                         
                         $("#otpmessage").html(JSON.parse(data).message);
                         //alert(JSON.parse(data).output);
                    }
                })
            })
            $("#otpbtnemail").on('click', function (){
                
                $.ajax({
                    url:'sendotpemail.php',
                    method:'post',
                    data: JSON.stringify({email:$("#email").val()}),
                    success:function(data){
                         
                         $("#eotpmessage").css('color','orange');
                         
                         $("#eotpmessage").html(JSON.parse(data).message);
                         //alert(JSON.parse(data).output);
                    }
                })
            })
</script>           
</script>


</body>
</html>