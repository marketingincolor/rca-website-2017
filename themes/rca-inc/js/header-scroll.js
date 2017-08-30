jQuery(document).ready(function($) {
	console.log('Start Header JS...............');
	var header = $('#entire-header');
	console.log('Header Obj: ' + header);
	var header_height = $('#entire-header').height();
	console.log('Header Height: ' + header_height);

	$(window).scroll(function() {
		console.log("Scroll Top: " + $(window).scrollTop());

		if( ($(window).scrollTop() > header_height) ) { 
			header.addClass('nav-fixed-top');
		}
		else { 
			header.removeClass('nav-fixed-top');
		}

	});

});