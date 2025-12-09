import $ from "jquery";

$(document).ready(function () {
	const $slider = $(".testimonials__slider");

	if ($slider.length) {
		$slider.slick({
			dots: false,
			arrows: false,
			infinite: true,
			speed: 550,
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 5000,
			cssEase: "ease-out",
			fade: true,
		});

		$(".testimonials__arrow--prev").on("click", function () {
			$slider.slick("slickPrev");
		});

		$(".testimonials__arrow--next").on("click", function () {
			$slider.slick("slickNext");
		});
	}
});
