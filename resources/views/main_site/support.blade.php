@include('layouts.mainsite.header')
<!-- Start page-title -->
<div class="page-title text-center">
  <div class="container">
    <h1>Support</h1>
    <p>Let’s get connect with us for being a part of Grow Helps. </p>
  </div>
</div>
<!-- End page-title -->
 <section id="whitepaper" class="section_light_bg">
    <div class="container">
        <div id="contact">
              <div class="row text-center">
                  <div class="col-md-12">
                    <div class="title_dark">
                      <span class="animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.1s" style="animation-delay: 0.1s; visibility: visible;">Contact Us</span>
                      <h2 class="animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.2s" style="animation-delay: 0.2s; visibility: visible;">Get in touch!</h2>
                    </div>
                  </div>
              </div>
              <div class="divider small_divider"></div>
              <div class="row">
                  <div class="col-md-7 col-lg-6 offset-lg-1">
                                                <form method="post" name="mainform" onsubmit="return checkform()" class="form_field"><input type="hidden" name="form_id" value="15458135934390"><input type="hidden" name="form_token" value="aedb8955414ce5eac20074b62a400133">
                <input type="hidden" name="a" value="support">
                    <input type="hidden" name="action" value="send">
                          <div class="row">
                              <div class="form-group col-md-6 animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.1s" style="animation-delay: 0.1s; visibility: visible;">
                                        <input type="text" name="name" placeholder="Name or Username" value="" class="form-control"/>
                                                </div>
                              <div class="form-group col-md-6 animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.2s" style="animation-delay: 0.2s; visibility: visible;">
                                                      <input type="email" placeholder="Your Email" name="email" value="" class="form-control"/>
                                                </div>
                              <div class="form-group col-md-12 animation" data-animation="fadeInUp" data-animation-delay="0.4s" style="animation-delay: 0.4s;">
                                  <textarea  placeholder="Message"  class="form-control" name="message" rows="2"></textarea>
                              </div>
                                <div class="form-group col-md-12 animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.4s" style="animation-delay: 0.1s; visibility: visible;">
                  <label class="captcha-img"><img src="{{asset('')}}https://cryptime.io/show_validation_image/PHPSESSID/h0ijqi3q5s1kn9n5ifnuv54421/rand/1839916271"/></label>
                  <input type="text" placeholder="Enter Captcha Code from above image" name=validation_number class="form-control"/>
                </div>
                                              <div class="col-md-12 text-center animation" data-animation="fadeInUp" data-animation-delay="0.5s" style="animation-delay: 0.5s;">
                                  <button class="btn btn-default">Submit <i class="ion-ios-arrow-thin-right"></i></button>
                              </div>
                          </div>
                      </form>
                              </div>
                  <div class="col-lg-5 col-md-5 res_sm_mt_30">
                      <ul class="list_none contact_info mt-margin">
                         <li class="input-group-prepend align-items-center animation" data-animation="fadeInUp" data-animation-delay="0.2s" style="animation-delay: 0.2s;">
                              
                                  
                              </div>
                         </li>
                         <li class="input-group-prepend align-items-center animation" data-animation="fadeInUp" data-animation-delay="0.3s" style="animation-delay: 0.3s;">
                             
                              </div>
                         </li>
                      </ul>
                  </div>
              </div>
          </div>
    </div>
    <div class="rounded_shape light_rounded_shape1"></div>
    <div class="rounded_shape light_rounded_shape2"></div>
  </section>
<!-- START FOOTER SECTION --> 
@include('layouts.mainsite.footer')