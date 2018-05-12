$(document).ready(function() {
	
	redrawDotNav();
	
	/* Scroll event handler */
    $(window).bind('scroll',function(e){
    	parallaxScroll();
		redrawDotNav();
    });
    
	/* Next/prev and primary nav btn click handlers */
	$('a.article01').click(function(){
    	$('html, body').animate({
    		scrollTop:0
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
	});
    $('a.article02').click(function(){
    	$('html, body').animate({
    		scrollTop:$('#article02').offset().top
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
    });
    $('a.article03').click(function(){
    	$('html, body').animate({
    		scrollTop:$('#article03').offset().top
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
    });
	$('a.article04').click(function(){
    	$('html, body').animate({
    		scrollTop:$('#article04').offset().top
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
    });
    
    /* Show/hide dot lav labels on hover */
    $('nav#primary a').hover(
    	function () {
			$(this).prev('h1').show();
		},
		function () {
			$(this).prev('h1').hide();
		}
    );
    
});

/* Scroll the background layers */
function parallaxScroll(){
	var scrolled = $(window).scrollTop();
	$('#parallax-bg1').css('top',(0-(scrolled*.5))+'px');
	$('#parallax-bg2').css('top',(0-(scrolled*.8))+'px');
	$('#parallax-bg3').css('top',(0-(scrolled*1.4))+'px');
}

/* Set navigation dots to an active state as the user scrolls */
function redrawDotNav(){
	var section1Top =  0;
	// The top of each section is offset by half the distance to the previous section.
	var section2Top =  $('#article02').offset().top - (($('#article03').offset().top - $('#article02').offset().top) / 2);
	var section3Top =  $('#article03').offset().top - (($('#article04').offset().top - $('#article03').offset().top) / 2);
	var section4Top =  $('#article04').offset().top - (($(document).height() - $('#article04').offset().top) / 2);;
	$('nav#primary a').removeClass('active');
	if($(document).scrollTop() >= section1Top && $(document).scrollTop() < section2Top){
		$('nav#primary a.article01').addClass('active');
	} else if ($(document).scrollTop() >= section2Top && $(document).scrollTop() < section3Top){
		$('nav#primary a.article02').addClass('active');
	} else if ($(document).scrollTop() >= section3Top && $(document).scrollTop() < section4Top){
		$('nav#primary a.article03').addClass('active');
	} else if ($(document).scrollTop() >= section4Top){
		$('nav#primary a.article04').addClass('active');
	}
	
}
