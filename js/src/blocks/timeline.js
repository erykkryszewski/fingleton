import $ from "jquery";

$(document).ready(function () {
	const $timelineSlider = $(".timeline__slider");

	if ($timelineSlider.length) {
		$timelineSlider.slick({
			dots: false,
			arrows: true,
			infinite: false,
			speed: 600,
			slidesToShow: 4,
			slidesToScroll: 1,
			cssEase: "ease-out",
			prevArrow:
				'<button type="button" class="slick-prev"><svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11 1L2 10L11 19" stroke="#232323" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>',
			nextArrow:
				'<button type="button" class="slick-next"><svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L10 10L1 19" stroke="#232323" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>',
			responsive: [
				{
					breakpoint: 1200,
					settings: {
						slidesToShow: 3,
					},
				},
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 2,
					},
				},
				{
					breakpoint: 576,
					settings: {
						slidesToShow: 1,
						arrows: false,
						dots: true,
					},
				},
			],
		});
	}
});
