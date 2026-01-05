jQuery(function ($) {
    const timelineSliderElementName = $(".timeline__slider");

    if (!timelineSliderElementName.length) return;
    if (timelineSliderElementName.hasClass("slick-initialized")) return;

    const arrowLeftHtmlString =
        '<button type="button" class="slick-prev" aria-label="Previous"><svg viewBox="0 0 24 24" fill="none"><path d="M15 19L8 12L15 5" stroke-linecap="round" stroke-linejoin="round"/></svg></button>';
    const arrowRightHtmlString =
        '<button type="button" class="slick-next" aria-label="Next"><svg viewBox="0 0 24 24" fill="none"><path d="M9 5L16 12L9 19" stroke-linecap="round" stroke-linejoin="round"/></svg></button>';

    timelineSliderElementName.slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        initialSlide: 2,
        infinite: false,
        centerMode: true,
        centerPadding: "150px",
        arrows: true,
        dots: false,
        prevArrow: arrowLeftHtmlString,
        nextArrow: arrowRightHtmlString,
        responsive: [
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 3,
                    centerPadding: "100px",
                    initialSlide: 1,
                },
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    centerPadding: "100px",
                    initialSlide: 1,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    centerPadding: "40px",
                    initialSlide: 1,
                },
            },
        ],
    });
});
