

jQuery(document).ready(function() {	
		"use strict";

  $(".twitter-carousel").owlCarousel({
 
		autoplay:true, //Set AutoPlay to 3 seconds
		autoplaySpeed : 2000,
		items : 1,
		margin:30,
		loop : true,
		
		navigation : true,
		responsive:{
        0:{
            items:1,
        },
        700:{
            items:1,
        },
        1050:{
            items:1,
			
        },
		1051:{
            items:1,
			
        }
    }
  });
  setInterval(function(){
  $('.owl-carousel').each( function() {
		
           var $mycarousel = $(this);
			
            $mycarousel.owlCarousel({     
             
        autoplay: $mycarousel.data("autoplay"),
		autoplaySpeed : $mycarousel.data("autoplay-speed"),
		items : $mycarousel.data("items"),
		margin:$mycarousel.data("gutter"),
		loop : $mycarousel.data("loop"),
		navigation : true,
		merge:true,
		autoplayHoverPause:true,
		responsiveRefreshRate:1,
		nav: $mycarousel.data("nav"),
		navText: ["<i class='helpme-icon-angle-left'></i>","<i class='helpme-icon-angle-right'></i>"],
		autoplayTimeout : $mycarousel.data("autoplay-delay"),
		responsive:{
        0:{
            items:1,
        },
        700:{
            items : $mycarousel.data("items-tab"),
        },
        960:{
            items : $mycarousel.data("items-tab-ls"),
			
        },
		1025:{
            items : $mycarousel.data("items"),
			
        }
    }
			}); 
		});
        },100);
 }); 
 
