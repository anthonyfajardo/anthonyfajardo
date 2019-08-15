console.log('custom-scripts.js loaded');

( function($) {
	$(document).ready(function(){
		$('#menu-toggle').click(function(){
			$(this).toggleClass('open');
			$("#primary").toggleClass('toggled');
		});

		// $('li.menu-item a').click(function(){
		// 	$("#menu-toggle").toggleClass('open');
		// 	$("#primary").toggleClass('toggled');
		// });
	});

	$(document).scroll(function(){
		var $nav = $(".site-header");
		$nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
	});	

	$('a[href*=\\#]:not([href=\\#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: (target.offset().top - 80)
				}, 1000);
				return false;
			}
		}
	});


	// navigation styling

	var navHeight = $(".site-header").height();
	console.log(navHeight);

	$("#subpages").css("margin-top", navHeight + 25);
	$(".single-post-wrapper").css("margin-top", navHeight);



} )(jQuery);


