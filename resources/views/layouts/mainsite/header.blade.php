<!DOCTYPE html>
<html lang="en">

<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Grow Helps || Home</title>
<base  src="index.php" />
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="{{asset('')}}mainsite/assets/images/logo_dark.png">
<!-- Animation CSS -->
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/css/animate.css" >   
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
<link id="layoutstyle" rel="stylesheet" href="{{asset('')}}mainsite/assets/color/theme.css">
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/css/custom.css">
<link rel="stylesheet" href="{{asset('')}}mainsite/assets/css/responsive-clone.css">

<meta property="og:title" content="Grow Helps Limited" />
<meta property="og:description" content="Grow Helps is a responsible firm that enhances your investments by using modern technology and continuous monitoring of experts. Grow Helps contains well maintained and advanced infrastructure and specialists that potentially offering profitable investment sources and methods. We recognize the different needs of users and we have awesome investment plans to meet every users goal." />
<meta property="og:image" content="{{asset('')}}mainsite/assets/images/logo_dark.png" />
</head>
<body class="v_light" data-spy="scroll" data-offset="110">
<!-- START HEADER -->
<header class="header_wrap fixed-top">
        <!-- Start top-header -->
        <!-- <div class="top-header">
          <div class="container clearfix">
            <div class="top-header-left">
              <div class="crypto-curancy">
                  <img src="assets/images/bitcoin.png">
                  <span class="coinmarketcap-currency-widget" data-currency="bitcoin" data-base="USD" data-secondary="" data-ticker="true" data-rank="false" data-marketcap="false" data-volume="false" data-stats="USD" data-statsticker="false"></span>
              </div>
            </div>
             <div class="top-header-right">
              <ul class="social-media">
                <li><a target="_blank" href="https://www.facebook.com/Grow Helps-Limited-373885646718352/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a target="_blank" href="https://twitter.com/Grow Helpslimited"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a target="_blank" href="https://vimeo.com/user92977580"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
        <li><a target="_blank" href="https://www.youtube.com/channel/UCzj3Ot4V2yAMYrUoHfFjEKg"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
        <li><a target="_blank" href="https://t.me/Grow Helpsofficial"><i class="fa fa-paper-plane" aria-hidden="true"></i></a></li>
              </ul>
             </div>
          </div>
       </div> -->
        <!-- End top-header -->
       <nav class="navbar navbar-expand-lg"> 
        <div class="container">
          <a class="navbar-brand page-scroll animation" href='#' data-animation="fadeInLeft" data-animation-delay="0.8s">
            <img class="logo_light" src="{{asset('')}}mainsite/assets/images/logo_dark.png" alt="logo" />
            <img class="logo_dark" height="90" src="{{asset('')}}mainsite/assets/images/logo_dark.png" alt="logo" />
          </a>
      <!--start language changer-->
     <!--  <div class="language-changer animation" data-animation="fadeInLeft" data-animation-delay="0.8s">
      <div class="language-wrapper">
         <span class="active-lang"><img src="assets/images/united-kingdom.png"/> ENGLISH</span>
       <div class="lang-list">
         <ul>
            <li><a href='home/language/ru.php'><img src="assets/images/russia.png"/>РУССКИЙ</a></li>
          <li><a href='home/language/cn.php'><img src="assets/images/china.png"/>中文</a></li>
          <li><a href='home/language/jp.php'><img src="assets/images/japan.png"/>日本人</a></li>
          <li><a href='home/language/kr.php'><img src="assets/images/south-korea.png"/>한국어</a></li>
          <li><a href='home/language/es.php'><img src="assets/images/spain.png"/>español</a></li>
          <li><a href='home/language/de.php'><img src="assets/images/germany.png"/>Deutsche</a></li>
          <li><a href='home/language/vt.php'><img src="assets/images/vietnam.png"/>TiếngViệt</a></li>
         </ul>
       </div>
      </div>
      </div> -->
      <!--end language changer-->
          <button class="navbar-toggler animation" data-animation="fadeInRight" data-animation-delay="1.2s" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="ion-android-menu"></span> </button>       
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav animation" data-animation="fadeInDown" data-animation-delay="1.2s">
              <li><a class="nav-link" href="{{asset('')}}">Home</a></li>
              <li><a class="nav-link" href="{{route('about-us')}}">About</a></li>
              <li><a class="nav-link" href="{{route('services')}}">How It Work</a></li>
              <li><a class="nav-link" href="{{route('affiliate')}}">Affiliate</a></li>
              <li><a class="nav-link" href="{{route('faq')}}">News</a></li>
              <li><a class="nav-link" href="{{route('support')}}">Support</a></li>
            </ul>
            <ul class="navbar-nav nav_btn animation" data-animation="fadeInRight" data-animation-delay="1.6s">
                         <li><a class="btn btn-default" href="{{route('login')}}">Login</a></li>
               <li><a class="btn btn-default" href="{{route('register')}}">Sign Up</a></li>
                    </ul>
          </div>
    </div>
      </nav>
  </header>
  <!-- End HEADER --> 
  