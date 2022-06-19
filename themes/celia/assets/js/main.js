// preloader
$(window).on("load", function () {
	$("#preloader").fadeOut(400);
});


$(document).ready(function () {
	// toggle responsive mobile
	var $toggle = $(".toggle"),
		$collapse = $(".close"),
		$aside = $(".aside-transform"),
		$overlay = $(".overlay");

	$toggle.on("click", function () {
		$aside.addClass("active");
		$(".overlay").fadeToggle(300);
		//$("body").css({overflow: "hidden"});
	});
	$collapse.on("click", function () {
		$aside.removeClass("active");
		$overlay.addClass("active").fadeOut();
		//$("body").css({ overflow: "unset" });
	});

	// toggle sub-menu 
	// $(".dropdown-toggle").on('click', function (e) {
	// 	//	if ($(window).width() <= "991") {
	// 	//$(this).next().slideToggle(200);
	// 	$(this).next().slideToggle(200);
	// 	$(this).toggleClass("active");
	// 	e.preventDefault();
	// 	//	}
	// });

	// toggle search
	$(".search-input").on("change", function () {
		this.classList.toggle("is-not-empty", this.value != "");
	});

	// scroll back to top
	var button = $('.top');
	$(window).scroll(function () {
		if ($(window).scrollTop() > 400) {
			button.addClass('show');
		} else {
			button.removeClass('show');
		}
	});

	button.on('click', function (e) {
		e.preventDefault();
		$('html, body').animate({ scrollTop: 0 }, '400');
	});
});

// magnific popup
jQuery('.gallery').magnificPopup({
	delegate: 'a',
	type: 'image',
	gallery: {
		enabled: true,
		navigateByImgClick: true,
		preload: [0, 3], // Will preload 0 - before current, and 1 after the current image
		tPrev: 'Previous', // title for left button
		tNext: 'Next', // title for right button
	},
	removalDelay: 300,
	closeOnContentClick: true,
	midClick: true,
	mainClass: 'mfp-fade',
	// callbacks: {
	// 	buildControls: function () {
	// 		// re-appends controls inside the main container
	// 		this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
	// 	}
	// }
});