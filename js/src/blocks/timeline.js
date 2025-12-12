jQuery(function ($) {
	const timelineSliderElementName = $(".timeline__slider");

	if (!timelineSliderElementName.length) {
		return;
	}

	if (timelineSliderElementName.hasClass("slick-initialized")) {
		return;
	}

	const arrowLeftHtmlString =
		'<button type="button" class="slick-prev" aria-label="Previous"><svg viewBox="0 0 24 24" fill="none"><path d="M15 19L8 12L15 5" stroke-linecap="round" stroke-linejoin="round"/></svg></button>';
	const arrowRightHtmlString =
		'<button type="button" class="slick-next" aria-label="Next"><svg viewBox="0 0 24 24" fill="none"><path d="M9 5L16 12L9 19" stroke-linecap="round" stroke-linejoin="round"/></svg></button>';

	timelineSliderElementName.slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		centerMode: true,
		centerPadding: "160px",
		infinite: false,
		arrows: true,
		dots: false,
		prevArrow: arrowLeftHtmlString,
		nextArrow: arrowRightHtmlString,
		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 2,
					centerPadding: "120px",
				},
			},
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 1,
					centerPadding: "140px",
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					centerPadding: "70px",
				},
			},
		],
	});
});
