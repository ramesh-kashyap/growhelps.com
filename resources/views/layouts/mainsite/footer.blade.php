<footer>
	  <div class="top_footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                	<div class="footer_logo animation" data-animation="fadeInUp" data-animation-delay="0.1s">
                    	<a href='{{asset('')}}home'><img height="150" alt="logo" src="{{asset('')}}mainsite/assets/images/logo_dark.png"></a>
                    </div>
                    <ul class="footer-menu clearfix">
                     <li><a href="{{asset('')}}">Home</a></li>
                     <li><a href="{{route('about-us')}}">About</a></li>
                     <li><a href="{{route('services')}}">How it Work</a></li>
                     <li><a href="{{route('affiliate')}}">Affiliate</a></li>
					 <li><a href="{{route('faq')}}">News</a></li>
					 
                     <li><a href="{{route('support')}}">Support</a></li>
					 
                    </ul>
      <!--              <ul class="list_none footer_social">-->
      <!--              	<li class="animation" data-animation="fadeInUp" data-animation-delay="0.1s"><a target="_blank" href="https://www.facebook.com/Cryptime-Limited-373885646718352/"><i class="ion-social-facebook"></i></a></li>-->
      <!--                  <li class="animation" data-animation="fadeInUp" data-animation-delay="0.3s"><a target="_blank" href="https://twitter.com/Cryptimelimited"><i class="ion-social-twitter"></i></a></li>-->
      <!--                  <li class="animation" data-animation="fadeInUp" data-animation-delay="0.5s"><a target="_blank" href="https://vimeo.com/user92977580"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>-->
						<!--<li class="animation" data-animation="fadeInUp" data-animation-delay="0.7s"><a target="_blank" href="https://www.youtube.com/channel/UCzj3Ot4V2yAMYrUoHfFjEKg"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>-->
      <!--                  <li class="animation" data-animation="fadeInUp" data-animation-delay="0.9s"><a target="_blank" href="https://t.me/cryptimeofficial"><i class="fa fa-paper-plane" aria-hidden="true"></i></a></li>-->
      <!--              </ul>-->
                </div>
            </div>
        </div>
  		<div class="rounded_shape light_rounded_shape2"></div>
    </div>
    <div class="bottom_footer staggered-animation-wrap">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6">
                	<p class="copyright">&copy; 2023 Grow Helps. All Rights Reserved.</p>
                </div>
                <!--<div class="col-md-6">-->
                <!--	<p class="we-accepted"><img src="assets/images/btc-accepted.png"/></p>-->
                </div>
            </div>
        </div>
    </div>
  </footer>
  <!-- END FOOTER SECTION --> 
  <a href="#" class="scrollup btn-default animation" data-animation="zoomIn" data-animation-delay="0.1s" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 
<!-- Latest jQuery --> 
<script src="{{asset('')}}mainsite/assets/js/jquery.js"></script> 
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
<!-- particles min js  --> 
<script src="{{asset('')}}mainsite/assets/js/particles.min.js"></script>
<!-- For currency -->
<script src="{{asset('')}}mainsite/assets/js/currency.js"></script>
<!-- scripts js --> 
<script src="{{asset('')}}mainsite/assets/js/scripts.js"></script>
<!-- scripts js --> 
<script src="{{asset('')}}mainsite/assets/js/function.js"></script>

	<script>
	$.ajax({
		type: "POST",
		async: false,
		url: "/php/date.php",
		success: function(html){
			var res = html.match(/\d+/ig);
			dates = new Date(res[0], res[1]-1, res[2], res[3], res[4], res[5]);
		}
	});
	function digitalWatch() {
	    var weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
		var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
		dates.setSeconds(dates.getSeconds() + 1);
		dayname = (weekday[dates.getDay()]);
		monthname = monthNames[dates.getMonth()];
		day = dates.getDate();
		month = dates.getMonth() + 1;
		year = dates.getFullYear();
		hours = dates.getHours();
		if(hours==0){ap=" AM";hours=12;}
        else if(hours<12){ap=" AM";}
        else if(hours==12){ap=" PM";}
        else if(hours>12){ap=" PM";hours-=12;}
		minutes = dates.getMinutes();
		seconds = dates.getSeconds();
		if (day < 10) day = "0" + day;
		if (month < 10) month = "0" + month;
		if (year < 10) year = "0" + year;
		if (hours < 10) hours = "0" + hours;
		if (minutes < 10) minutes = "0" + minutes;
		if (seconds < 10) seconds = "0" + seconds;
		//$("#date").text(day + "/" + month + "/" + year);
		$("#server_time").text(dayname + ", " + day + " , " + monthname + " " + hours + ":" + minutes + ap)
	}
	digitalWatch();
	setInterval(function(){ digitalWatch(); }, 1000);
	</script>
	
	<script type="text/javascript" src="../cdn.ywxi.net/js/1.js" async></script>
	<!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->
</body>

<!-- Mirrored from cryptime.io/home by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:44:25 GMT -->
</html>