

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- SITE TITLE -->
<title>Grow Hepls || Login</title>
<!--<base href="https://helpingpromo.com/" src="https://helpingpromo.com/" />-->
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="{{asset('')}}mainsite/assets/images/logo_dark.png">
<!-- Animation CSS -->
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/css/animate.css" >		
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/bootstrap/css/bootstrap.min.css">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
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
<link id="layoutstyle" rel="stylesheet" href="{{asset('')}}mainsite/assets/color/theme.css">
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/css/custom.css">
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/css/responsive-clone.css">
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
</head>
<body class="v_light" data-spy="scroll" data-offset="110">



<div class="divider small_divider"></div>

<script language=javascript>
function checkform() {
  document.getElementById('error').style.display = "none";
  var myNode = document.getElementById("error");
   myNode.innerHTML = '';
  if (document.mainform.username.value=='') {
    var div = document.getElementById('error');
	div.innerHTML = div.innerHTML + '<p>Please enter your username!</p>';
	document.getElementById('error').style.display = "block";
    document.mainform.username.focus();
    return false;
  }
  if (document.mainform.password.value=='') {
    var div = document.getElementById('error');
	div.innerHTML = div.innerHTML + '<p>Please enter your password!</p>';
	document.getElementById('error').style.display = "block";
    document.mainform.password.focus();
    return false;
  }
  return true;
}
</script>

<div class="customer-wrapper">
	<div class="container">
		<div class="customer-logo text-center">
			<a href='{{asset('')}}home'><img height="150" src="{{asset('')}}mainsite/assets/images/logo_dark.png"></a>
		</div>
		<div class="customer-form">
			<div class="form-container">
				<div class="customer-form-heading">
				    <h2>Login Now</h2>
					<p>Explore Your Account</p>
				</div>
                <form name="frmlogin" method="POST" action="{{route('login')}}">
                                                    {{ csrf_field() }}
					
					<ul class="form-list">
						<li>
							<div class="input-box">
								<div class="iconed">
									<span class="icon"><img src="{{asset('')}}mainsite/assets/images/user.png"></span>
									<input type="text" name="username" placeholder="Username" value="" class="form-control">
								</div>
							</div>
						</li>
						<li>
							<div class="input-box">
								<div class="iconed">
									<span class="icon"><img src="{{asset('')}}mainsite/assets/images/lock.png"></span>
									<input type="password" placeholder="Password" name="password" value="" class="form-control">
								</div>
							</div>
						</li>
							
					
					<li class="text-center">
							<button class="btn btn-default">Login</button>
						</li>
					</ul>
				</form>
			</div>
			<div class="bottom-line text-center">
				<p style="font-size:14px;">Still don't have an account? <a href="{{route('register')}}">Click Here</a></p>

							<p class="fog-pass">Forgot your password? <a href='{{asset('')}}/forgot_password'>Retrieve password</a></p>
						
			</div>
		</div>
	</div>
</div>


<div class="divider large_divider"></div>
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

</body>
</html>