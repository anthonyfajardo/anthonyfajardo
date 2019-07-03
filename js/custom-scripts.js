console.log('custom-scripts.js loaded');

( function($) {
	$(document).ready(function(){
		$('#menu-toggle').click(function(){
			$(this).toggleClass('open');
			$("#primary").toggleClass('toggled');
		});
	});
} )(jQuery);