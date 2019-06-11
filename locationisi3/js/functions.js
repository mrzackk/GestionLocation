
// If JavaScript is enabled remove 'no-js' class and give 'js' class
jQuery('html').removeClass('no-js').addClass('js');

// Add .osx class to html if on Os/x
if (navigator.appVersion.indexOf("Mac") !== -1) {
	jQuery('html').addClass('osx');
}

// When DOM is fully loaded
jQuery(document).ready(function($) {
  "use strict";

$('.selectpicker').selectpicker();
 
$("#advanced-search-container").hide();
$("#advanced-serach-container-button").click(function(event){
      event.preventDefault();
    $("#advanced-search-container").slideToggle( "slow" );
  }); 

  $(function() {
      fakewaffle.responsiveTabs(['xs', 'sm']);
  });



$(function() {
$(".inc").click(function() { var $button = $(this); var old = $button.parent().find("input").val(); var newVal = parseFloat(old) + 1; $button.parent().find("input").val(newVal); }); 

$(".dec").click(function() { var $button = $(this); var old = $button.parent().find("input").val(); var newVal = parseFloat(old) - 1; $button.parent().find("input").val(newVal); }); 
}); 

  

/* --------------------------------------------------------	
	 Onload
   --------------------------------------------------------	*/
$(window).load(function() { 


/* --------------------------------------------------------	
	 Preloader
   --------------------------------------------------------	*/
 

	$("#loadind").fadeOut();
	$("#loading-wrap").delay(350).fadeOut("fast");


/* --------------------------------------------------------	
	 Isotope
   --------------------------------------------------------	*/
   
    $('.portfolio-masonry-container').isotope({
        itemSelector: '.portfolio-masonry-item',
        layoutMode: 'masonry',
        onLayout: function () {

        }
    });

    $('.blog-masonry-container').isotope({
        itemSelector: '.blog-masonry-post',
        layoutMode: 'masonry'
    });

    $('.filter li a').on('click', function (event) {    
        event.preventDefault();        
        var selector = $(this).attr('data-filter');
        var container = $(this).closest('.portfolio-masonry-all').find('.portfolio-masonry-container');
        container.isotope({
            filter: selector
        });
        $(this).closest('ul.filter').children('li').removeClass('active');
        $(this).parent('li').addClass('active');

    });



   

/* --------------------------------------------------------	
	 Flexslider
   --------------------------------------------------------	*/
  
  // The slider being synced must be initialized first
  $('.carousel-slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 230,
    itemMargin: 10,
             
    directionNav: true,             
    prevText: "",           
    nextText: "",               
     
    asNavFor: '.slider-carousel'
  });
   
  $('.slider-carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    directionNav: true,             
    prevText: "",           
    nextText: "",     
    sync: ".carousel-slider"
  });
  
  $('.clasic-slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    directionNav: true,             
    prevText: "",           
    nextText: ""  
  });
  
 // owl carousel
$('.related-items-slider').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
    dots:false,
    navText: [],
    smartSpeed:650,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        992:{
            items:3
        },
        1200:{
            items:4
        }
    }
})     


      
$("#car_price").ionRangeSlider({
    type: "double",
    min: 100,
    max: 50000,
    from: 5000,
    to: 45000,
    hide_min_max: true,
    hide_from_to: false,
    step: 100,
    prefix: "$",    
    grid: true,
    force_edges: true,
    prettify_enabled: true,
    prettify_separator: "."
}); 

$("#shop_price").ionRangeSlider({
    type: "double",
    min: 1,
    max: 1000,
    from: 100,
    to: 900,
    hide_min_max: true,
    hide_from_to: false,
    step: 1,
    prefix: "$",    
    grid: true,
    force_edges: true,
    prettify_enabled: true,
    prettify_separator: "."
});

/* --------------------------------------------------------	
	 Fitvids
   --------------------------------------------------------	*/	


  $("body").fitVids();


    var hh = $("#myTabs").height(); 
    
    $('.full-tabs .tab-content>.active').css({"height": hh});
$('#myTabs a').click(function (e) {
    e.preventDefault();
    var h = $("#myTabs").height();
    $(this).tab('show');
    $('.full-tabs .tab-content>.active').css({"height": h});
       
}); 


      if ($('body').hasClass('no-main-slider')) {
        $('.navbar').addClass("navbar-background");
        $('.navbar').css({"position": "relative"});
    }  


}); 







/* --------------------------------------------------------	
	 list / grid view
   --------------------------------------------------------	*/
    $('#list-view').click(function(event){
        event.preventDefault();
        $('#products .item').addClass('list-item');
        $('#list-view').addClass('active');
        $('#grid-view').removeClass('active');      
      });
    $('#grid-view').click(function(event){
      event.preventDefault();
      $('#products .item').removeClass('list-item');
      $('#products .item').addClass('grid-item');
      $('#list-view').removeClass('active');
      $('#grid-view').addClass('active');       
    });

/* --------------------------------------------------------	
	 External links
   --------------------------------------------------------	*/	 
			$('a[rel=external]').attr('target','_blank');	

/* --------------------------------------------------------	
	 Tooltips
   --------------------------------------------------------	*/		
    $('body').tooltip({
        delay: { show: 300, hide: 0 },
        selector: '[data-toggle=tooltip]:not([disabled])'
    });
    

/* --------------------------------------------------------	
	 magnific popoup single image
   --------------------------------------------------------	*/
 
  $('.popup-link').magnificPopup({
  		type: 'image'
  	});
    
/* --------------------------------------------------------	
	 magnific popoup videos
   --------------------------------------------------------	*/
   $('.popup-youtube, .popup-vimeo').magnificPopup({
		  disableOn: 360,
		  type: 'iframe',
		  mainClass: 'mfp-fade',
		  removalDelay: 160,
		  preloader: true,
		  fixedContentPos: false
	 });
  
 
/* --------------------------------------------------------	
	 magnific popoup gallery
   --------------------------------------------------------	*/
  
 $('.gallery').each(function() { // the containers for all your galleries
    $(this).magnificPopup({
        delegate: 'a', // the selector for gallery item
        type: 'image',
        gallery: {
          enabled:true
        }
    });
 }); 


 
  
 /* --------------------------------------------------------	
	 Back To Top Button
   --------------------------------------------------------	*/	

  // hide #back-top first
	$(".back-to-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 1000) {
				$('.back-to-top').fadeIn(500);
			} else {
				$('.back-to-top').fadeOut(500);
			}
		});

	  // scroll body to 0px on click
		$('.back-to-top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 1200);
			return false;
		});
	}); 
  

   
  	
/* --------------------------------------------------------	
	 Move Nav
   --------------------------------------------------------	*/

  $(window).scroll(function(){ 
   if ($(this).scrollTop() >  50 ){ 
    
      $('.navbar').addClass("navbar-move");
      $('.navbar-inner').css({"background-color": "transparent"});
      $('.navbar-inner').css({"padding": "0"});
    } 
    else{
      $('.navbar').removeClass("navbar-move");
      $('.navbar-inner').css({"background-color": "f2f2f2"});
      $('.navbar-inner').css({"padding": "0 20"});
    }
  });
  


 
/* --------------------------------------------------------	
	 SelectNav
   --------------------------------------------------------	*/	
 
selectnav('nav', {
  label: 'Navigation',
  nested: true,
  indent: '-'
});


// detect mobile devices

   var detectmob = false;	
   if(navigator.userAgent.match(/Android/i)
    || navigator.userAgent.match(/webOS/i)
    || navigator.userAgent.match(/iPhone/i)
    || navigator.userAgent.match(/iPad/i)
    || navigator.userAgent.match(/iPod/i)
    || navigator.userAgent.match(/BlackBerry/i)
    || navigator.userAgent.match(/Windows Phone/i)) {							
      detectmob = true;
	}
  

  if (detectmob === false) {
      $('*[data-ani]').addClass('animated');
  }
  
 $('.animated').appear(function() {
  $(this).each(function(){ 
    $(this).css('visibility','visible');
    $(this).addClass($(this).data('type'));
  });
},{accY: -100});



$('.skill-shortcode').appear(function() {
  $('.progress').each(function(){ 
    $('.progress-bar').css('width',  function(){ return ($(this).attr('data-percentage')+'%')});
  });
},{accY: -100}); 




/* --------------------------------------------------------	
	 parallax
   --------------------------------------------------------	*/  
	if (detectmob === true) {
    $( '.parallax' ).each(function(){
				$(this).addClass('parallax-mobile');
		});
  }
  else {
  
  	//.parallax(xPosition, speedFactor, outerHeight) options:
	//xPosition - Horizontal position of the element
	//inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
	//outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
      $( '#parallax-one' ).parallax("100%", 0.5,true);
    }


/* --------------------------------------------------------	
	 counter
   --------------------------------------------------------	*/ 

$('.timer').countTo();

$('.counter-item').appear(function() {
    $('.timer').countTo();
},{accY: -100}); 

   


/* --------------------------------------------------------	
	 contact form
   --------------------------------------------------------	*/		
	$('#send').click(function(){ // when the button is clicked the code executes
		$('.error').fadeOut('slow'); // reset the error messages (hides them)

		var error = false; // we will set this true if the form isn't valid

		var name = $('input#name2').val(); // get the value of the input field
		if(name == "" || name == " " || name == "Name") {
    $('#err-name').show(500);
    $('#err-name').delay(4000);
    $('#err-name').animate({
      height: 'toggle'  
    }, 500, function() {
      // Animation complete.
    }); 
      error = true; // change the error state to true
		}

		var email_compare = /^([a-z0-9_.-]+)@([da-z.-]+).([a-z.]{2,6})$/; // Syntax to compare against input
		var email = $('input#email2').val().toLowerCase(); // get the value of the input field
		if (email == "" || email == " " || email == "E-mail") { // check if the field is empty
			$('#err-email').fadeIn('slow'); // error - empty
			error = true;
		}else if (!email_compare.test(email)) { // if it's not empty check the format against our email_compare variable

    $('#err-emailvld').show(500);
    $('#err-emailvld').delay(4000);
    $('#err-emailvld').animate({
      height: 'toggle'  
    }, 500, function() {
      // Animation complete.
    });         
			error = true;
		}
    
		var message = $('textarea#message2').val(); // get the value of the input field
		if(message == "" || message == " " || message == "Message") {

      
    $('#err-message').show(500);
    $('#err-message').delay(4000);
    $('#err-message').animate({
      height: 'toggle'  
    }, 500, function() {
      // Animation complete.
    });            
			error = true; // change the error state to true
		} 

		if(error == true) {

    $('#err-form').show(500);
    $('#err-form').delay(4000);
    $('#err-form').animate({
      height: 'toggle'  
    }, 500, function() {
      // Animation complete.
    });         
			return false;
		}

		var data_string = $('#ajax-form').serialize(); // Collect data from form
		//alert(data_string);

		$.ajax({
			type: "POST",
			url: $('#ajax-form').attr('action'),
			data: data_string,
			timeout: 6000,
			error: function(request,error) {
				if (error == "timeout") {
					$('#err-timedout').slideDown('slow');
				}
				else {
					$('#err-state').slideDown('slow');
					$("#err-state").html('An error occurred: ' + error + '');
				}
			},
			success: function() {

        
    $('#ajaxsuccess').show(500);
    $('#ajaxsuccess').delay(4000);
    $('#ajaxsuccess').animate({
      height: 'toggle'  
    }, 500, function() {
    });           

        $("#name").val('');
        $("#email").val('');
        $("#message").val('');
			}
		});

		return false; // stops user browser being directed to the php file
	}); // end click function
     


/* --------------------------------------------------------	
	 Color picker - demo only
   --------------------------------------------------------	*/ 
$(".color-1" ).click(function(){
	$("#color" ).attr("href", "css/color/color-1.css" );
	return false;
});

    
$(".color-2" ).click(function(){
	$("#color" ).attr("href", "css/color/color-2.css" );
	return false;
});
    
$(".color-3" ).click(function(){
	$("#color" ).attr("href", "css/color/color-3.css" );
	return false;
});

$(".color-4" ).click(function(){
	$("#color" ).attr("href", "css/color/color-4.css" );
	return false;
});

$(".color-5" ).click(function(){
	$("#color" ).attr("href", "css/color/color-5.css" );
	return false;
});


$('.color-picker').animate({left: '-239px'});
  		
$('.color-picker a.handle').click(function(e){
	e.preventDefault();
	var div = $('.color-picker');
	if (div.css('left') === '-239px') {
		$('.color-picker').animate({left: '0px'}); 
	} 
  else {
    $('.color-picker').animate({left: '-239px'});
	}
})


});

