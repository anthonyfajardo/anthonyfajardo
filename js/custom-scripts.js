console.log('custom-scripts.js loaded');

( function($) {
	$(document).ready(function(){
		$('#menu-toggle').click(function(){
			$(this).toggleClass('open');
			$("#primary").toggleClass('toggled');
		});
	});

	$(document).scroll(function(){
		var $nav = $(".site-header");
		$nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
	});	


} )(jQuery);