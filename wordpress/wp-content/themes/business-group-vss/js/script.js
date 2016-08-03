jQuery(document).ready(function($){
  $('.vss-home-slider').bxSlider({
  	auto:true
  });
  
  
   $("#owl-demo").owlCarousel({
 
      autoPlay: 3000, //Set AutoPlay to 3 seconds
      items : 8,
	  dots : true,
	  responsive:{
        0:{
            items:3

        },
        600:{
            items:5

        },
        1000:{
            items:8
        }
    }
 
  });
  
  
});