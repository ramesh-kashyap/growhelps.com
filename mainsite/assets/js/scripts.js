/*===================================
Author       : Bestwebcreator.
Template Name: Cryptoking - Bitcoin & ICO Cryptocurrency Landing Page HTML Template
Version      : 1.3
===================================*/

/*===================================*
LANDING PAGE JS
*===================================*/

(function($) {
	'use strict';
	
	/*===================================*
	01. LOADING JS
	/*===================================*/
	// $(window).on('load', function() {
	// 	var preLoder = $(".preloader");
	// 	preLoder.delay(700).fadeOut(500);
	// });

	/*===================================*
	02. SMOOTH SCROLLING JS
	*===================================*/
	// Select all links with hashes
    $('a.page-scroll').on('click', function(event) {
        // On-page links
        if ( location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname ) {
          // Figure out element to scroll to
          var target = $(this.hash),
              speed= $(this).data("speed") || 800;
              target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

          // Does a scroll target exist?
          if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();
            $('html, body').animate({
              scrollTop: target.offset().top - 60
            }, speed);
          }
        }
    });
	
	/*===================================*
	03. MENU JS
	*===================================*/
	//Main navigation scroll spy for shadow
	$(window).on('scroll', function() {
		var scroll = $(window).scrollTop();

	    if (scroll >= 80) {
	    	
	    
	        $('header').addClass('nav-fixed');
	        $('.top-header').hide();
	       
	    } else {
	        $('header').removeClass('nav-fixed');
	        $('.top-header').show();
	    }

	});

	//Hide Navbar Dropdown After Click On Links
	var navBar = $(".header_wrap");
	var navbarLinks = navBar.find(".navbar-collapse ul li a");

    $.each( navbarLinks, function( i, val ) {

      var navbarLink = $(this);
		navbarLink.on('click', function () {
        navBar.find(".navbar-collapse").collapse('hide');
        });
	});
	
	//Main navigation Active Class Add Remove
	$('.navbar-toggler').on('click', function() {
	    $("header").toggleClass("active");
	});
   
	/*===================================*
	04. BACKGROUND ANIMATION JS
	*===================================*/
	var $particles_js = $('#banner_bg_effect');
	if ($particles_js.length > 0) {
		particlesJS('banner_bg_effect',
			// Update your personal code.
			{
				"particles": {
					"number": {
						"value": 80,
						"density": {
							"enable": true,
							"value_area": 800
						}
					},
					"color": {
						"value": "#26B6D4"
					},
					"shape": {
						"type": "polygon",
						"stroke": {
							"width": 0,
							"color": "#000000"
						},
						"polygon": {
							"nb_sides": 5
						},
						"image": {
							"src": "img/github.svg",
							"width": 100,
							"height": 100
						}
					},
					"opacity": {
						"value": 0.4,
						"random": false,
						"anim": {
							"enable": false,
							"speed": 1,
							"opacity_min": 0.1,
							"sync": false
						}
					},
					"size": {
						"value": 3,
						"random": true,
						"anim": {
							"enable": false,
							"speed": 40,
							"size_min": 0.1,
							"sync": false
						}
					},
					"line_linked": {
						"enable": true,
						"distance": 150,
						"color": "#26B6D4",
						"opacity": 0.1,
						"width": 1
					},
					"move": {
						"enable": true,
						"speed": 6,
						"direction": "none",
						"random": false,
						"straight": false,
						"out_mode": "out",
						"bounce": false,
						"attract": {
							"enable": false,
							"rotateX": 600,
							"rotateY": 1200
						}
					}
				},
				"interactivity": {
					"detect_on": "canvas",
					"events": {
						"onhover": {
							"enable": true,
							"mode": "repulse"
						},
						"onclick": {
							"enable": true,
							"mode": "push"
						},
						"resize": true
					},
					"modes": {
						"grab": {
							"distance": 400,
							"line_linked": {
								"opacity": 1
							}
						},
						"bubble": {
							"distance": 400,
							"size": 40,
							"duration": 2,
							"opacity": 8,
							"speed": 3
						},
						"repulse": {
							"distance": 200,
							"duration": 0.4
						},
						"push": {
							"particles_nb": 4
						},
						"remove": {
							"particles_nb": 2
						}
					}
				},
				"retina_detect": true
			}
	
		);
	}
	
	  
  	/*===================================*
	05. BACKGROUND ANIMATION JS
	*===================================*/
	 $('.roadmap').owlCarousel({
	     loop: false,
	     margin: 30,
	     nav: true,
	     navText: ['<i class="ion-ios-arrow-back"></i>', '<i class="ion-ios-arrow-forward"></i>'],
	     responsive: {
	         0: {
	             items: 1,

	         },
	         380: {
	             items: 2,
	             margin: 15,
	         },
	         600: {
	             items: 3
	         },
	         1000: {
	             items: 5
	         },
	         1199: {
	             items: 5
	         }
	     }
	 });
	/*===================================*
	 07. VIDEO JS
	*===================================*/
	$('.video').magnificPopup({
		type: 'iframe'
	});
	
	/*===================================*
	09. SCROLLUP JS
	*===================================*/
	$(window).scroll(function() {
		if ($(this).scrollTop() > 150) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
	});
	
	$(".scrollup").on('click', function (e) {
		e.preventDefault();
		$('html, body').animate({
			scrollTop: 0
		}, 600);
		return false;
	});
	
	
	/*===================================*
	10. POPUP JS
	*===================================*/
	$('.content-popup').magnificPopup({
		type: 'inline',
		preloader: true,
		mainClass: 'mfp-zoom'
	});
	$('.mag-image-link').magnificPopup({type:'image'});
	/*===================================*
	11. ANIMATION JS
	*===================================*/
	$(function() {
	
		function ckScrollInit(items, trigger) {
			items.each(function() {
				var ckElement = $(this),
					AnimationClass = ckElement.attr('data-animation'),
					AnimationDelay = ckElement.attr('data-animation-delay');
	
				ckElement.css({
					'-webkit-animation-delay': AnimationDelay,
					'-moz-animation-delay': AnimationDelay,
					'animation-delay': AnimationDelay
				});
	
				var ckTrigger = (trigger) ? trigger : ckElement;
	
				ckTrigger.waypoint(function() {
					ckElement.addClass("animated").css("visibility", "visible");
					ckElement.addClass('animated').addClass(AnimationClass);
				}, {
					triggerOnce: true,
					offset: '90%'
				});
			});
		}
	
		ckScrollInit($('.animation'));
		ckScrollInit($('.staggered-animation'), $('.staggered-animation-wrap'));
	
	});	
})(jQuery);

