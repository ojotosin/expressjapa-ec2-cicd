(function ($) {
	
	// Slider
	$('.slide-carousel').owlCarousel({
		loop: true,
		autoplay: true,
		autoplayHoverPause: true,
		autoplaySpeed: 1500,
		smartSpeed: 1500,
		animateIn: 'fadeIn',
		animateOut: 'fadeOut',
		margin: 0,
		dots: true,
		nav: true,
		navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
		responsive: {
			0: {
				items: 1,
				nav: false
			},
			576: {
				items: 1
			},
			1000: {
				items: 1
			}
		}
	});

	$('.slide-carousel').on('translate.owl.carousel', function () {
		$('.text-animated h1').removeClass('fadeInDown animated').hide();
		$('.text-animated p').removeClass('fadeInUp animated').hide();
		$('.text-animated li').removeClass('fadeInUp animated').hide();
	});

	$('.slide-carousel').on('translated.owl.carousel', function () {
		$('.text-animated h1').addClass('fadeInDown animated').show();
		$('.text-animated p').addClass('fadeInUp animated').show();
		$('.text-animated li').addClass('fadeInUp animated').show();
	});

	// Featured
	$('.featured-carousel').owlCarousel({
		loop: false,
		autoplay: true,
		margin: 30,
		nav: false,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1,
				dots: false
			},
			520: {
				items: 1,
				dots: false
			},
			768: {
				items: 3
			},
			1000: {
				items: 3
			}
		}
	});
	
	// Team 
	$('.team-carousel').owlCarousel({
		loop: true,
		autoplay: true,
		autoplayHoverPause: true,
		margin: 30,
		dots: true,
		nav: false,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1,
				dots: false,
				nav: true
			},
			460: {
				items: 2,
				dots: false,
				nav: true
			},
			768: {
				items: 3
			},
			992: {
				items: 4
			},
			1200: {
				items: 4
			}
		}
	});

	// Testimonia
	$('.testimonial-gallery').owlCarousel({
		loop: false,
		autoplay: true,
		margin: 30,
		nav: false,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			1000: {
				items: 1
			}
		}
	});

	// Testimonia-Page
	$('.testi-page-carousel').owlCarousel({
		loop: false,
		autoplay: true,
		margin: 30,
		nav: false,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1,
				dots: false,
				nav: true
			},
			620: {
				items: 2,
				dots: false,
				nav: true
			},
			768: {
				items: 2
			},
			1000: {
				items: 2
			}
		}
	});

	// Blog
	$('.blog-carousel').owlCarousel({
		loop: true,
		autoplay: true,
		autoplayHoverPause: true,
		autoplaySpeed: 1500,
		smartSpeed: 1500,
		margin: 30,
		nav: true,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			768: {
				items: 2
			},
			992: {
				items: 3
			},
			1000: {
				items: 3
			}
		}
	});
	
	// Brand
	$('.brand-carousel').owlCarousel({
		loop: true,
		autoplay: true,
		autoplayHoverPause: true,
		autoplaySpeed: 1500,
		smartSpeed: 1500,
		margin: 30,
		nav: false,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 2
			},
			575: {
				items: 4
			},
			991: {
				items: 5
			},
			1200: {
				items: 6
			}
		}
	});

	// Featured Detail
	$('.single-feat-carousel').owlCarousel({
		loop: true,
		margin: 30,
		nav: true,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			1000: {
				items: 1
			}
		}
	});
	
	// Initiate the wowjs
  	new WOW().init();
	
	// Superfish Menu
	$(".sf-menu").superfish({
		pathLevels: 1,
		delay: 0,
		animation: {opacity: 'show'},
		animationOut: {opacity: 'hide'},
		speed: 'fast',
		speedOut: 'fast',
		cssArrows: true,
		disableHI: false,
	});
    
    // Magnific Popup
    $('.magnific').magnificPopup({
      type: 'image',
      gallery:{
	    enabled:true
	  }
    });
	
	 // Scroll-Top
	$(".scroll-top").hide();
	$(window).on("scroll", function () {
		if ($(this).scrollTop() > 300) {
			$(".scroll-top").fadeIn();
		} else {
			$(".scroll-top").fadeOut();
		}
	});
	$(".scroll-top").on("click", function () {
		$("html, body").animate({
			scrollTop: 0,
		}, 700)
	});
	

	$(window).load(function () {
		$('#preloader').fadeOut();
		$('#preloader-status').delay(200).fadeOut('slow');
		$('body').delay(200).css({
			'overflow-x': 'hidden'
		});
	});
	
	// Counter
	$('.counter').counterUp({
		delay: 10,
		time: 1000
	});
	
	$('#example').DataTable();
	
	// Slicknav
	$('#menu').slicknav();
	
	// Filtr-Gallery
	//$('.filtr-container').filterizr();
	
	// Filtering section nav
	// $('#filtrnav li').on('click', function() {
	// 	$('.filtr').removeClass('filtr-active');
	// 	$(this).addClass('filtr-active');
	// 	var filter = $(this).data('fltr');
	// 	filtrnav.filterizr('filter', filter);
	// });

	advFieldsStatus = $('#advFieldsStatus').val();

	$('#paypal_form').hide();
	$('#stripe_form').hide();
	$('#bank_form').hide();

    $('#advFieldsStatus').on('change',function() {
        advFieldsStatus = $('#advFieldsStatus').val();
        if ( advFieldsStatus == '' ) {
        	$('#paypal_form').hide();
			$('#stripe_form').hide();
			$('#bank_form').hide();
        } else if ( advFieldsStatus == 'PayPal' ) {
           	$('#paypal_form').show();
			$('#stripe_form').hide();
			$('#bank_form').hide();
        } else if ( advFieldsStatus == 'Stripe' ) {
           	$('#paypal_form').hide();
			$('#stripe_form').show();
			$('#bank_form').hide();
        } else if ( advFieldsStatus == 'Bank Deposit' ) {
        	$('#paypal_form').hide();
			$('#stripe_form').hide();
			$('#bank_form').show();
        }
    });


})(jQuery);