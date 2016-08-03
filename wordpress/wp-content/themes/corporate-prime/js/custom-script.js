jQuery(document).ready(function() {
	
	/* Menu */
	if( jQuery(window).width() > 767) {
	   jQuery('.nav li.dropdown').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   }); 
	   jQuery('.nav li.dropdown-submenu').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   }); 
	}
	
	jQuery('li.dropdown').find('.caret').each(function(){
		jQuery(this).on('click', function(){
			if( jQuery(window).width() < 767) {
				jQuery(this).parent().next().slideToggle();
			}
			return false;
		});
	});
});
	/* Menu */
jQuery(document).ready(function($) {
	/* Slider 1 */
	var swiper1 = new Swiper('.swiper1', {
		pagination: '.swiper-pagination1',
		nextButton: '.swiper-button-next1',
		prevButton: '.swiper-button-prev1',
		slidesPerView: '1',
		paginationClickable: true,
		spaceBetween: 10,
		autoplay: 3000,
		loop: true
	});
	
	
	
	/* Slider 1 */

	/* Testimonail */
	var swiper2 = new Swiper('.swiper2', {
		pagination: '.swiper-pagination2',
		nextButton: '.swiper-button-next2',
		prevButton: '.swiper-button-prev2',
		slidesPerView: '2',
		paginationClickable: true,
		spaceBetween: 10,
		autoplay: 3000,
		loop: true
	});
	/* Testimonail 1 */

	/* Client */
	var swiper3 = new Swiper('.swiper3', {
		pagination: '.swiper-pagination3',
		nextButton: '.swiper-button-next3',
		prevButton: '.swiper-button-prev3',
		slidesPerView: '5',
		paginationClickable: true,
		spaceBetween: 10,
		autoplay: 3000,
		loop: true,
		breakpoints:{
		1040: {
			slidesPerView: 4,
			spaceBetween: 40
		},
		768: {
			slidesPerView: 3,
			spaceBetween: 30
		},
		640: {
			slidesPerView: 2,
			spaceBetween: 20
		},
		320: {
			slidesPerView: 1,
			spaceBetween: 10
		}
		}
	});
	/* Related */
	var swiper4 = new Swiper('.swiper4', {
		nextButton: '.swiper-button-next4',
		prevButton: '.swiper-button-prev4',
		slidesPerView: '4',
		paginationClickable: true,
		spaceBetween: 10,
		autoplay: 3000,
		loop: true,
		1040: {
			slidesPerView: 4,
			spaceBetween: 10
		},
		768: {
			slidesPerView: 3,
			spaceBetween: 10
		},
		640: {
			slidesPerView: 2,
			spaceBetween: 10
		},
		320: {
			slidesPerView: 1,
			spaceBetween: 10
		}
	});

	/* portfolio photobox */
	$(function() {
		var gallery = $('.port-gallery .c_pics').simpleLightbox();
		var gallery = $('.port-gallery .c_port').simpleLightbox();

	});
	/* Slider */

	// Isotope blog
	var $service_style1 = $('.gallery1');
	$(window).load(function() {
		// Initialize Isotope
		$service_style1.isotope({
			itemSelector: '.wl-gallery'
		});
	});
	/* /* for scroll arrow */
	var amountScrolled = 300;
	$(window).scroll(function() {
		if ($(window).scrollTop() > amountScrolled) {
			$('a.scroll_up').fadeIn('slow');
		}
		else {
			$('a.scroll_up').fadeOut('slow');
		}
	});

	$('a.scroll_up').click(function() {
		$('html, body').animate({
			scrollTop: 0
		}, 700);
		return false;
	});

});

/* for funfacts  */
(function($) {
	"use strict";

	function count($this) {
		var current = parseInt($this.html(), 10);
		current = current + 1;
		$this.html(++current);
		if (current > $this.data('count')) {
			$this.html($this.data('count'));
		}
		else {
			setTimeout(function() {
				count($this)
			}, 10);
		}
	}
	$(".stat-count").each(function() {
		$(this).data('count', parseInt($(this).html(), 10));
		$(this).html('0');
		count($(this));
	});
})(jQuery);