import $ from "jquery";

$(document).ready(() => {
    let heroSlider = $(".hero-slider");

    heroSlider.on("init", function (event, slick) {
        // Remove 'slick-active' class from the center slide
        $(".hero-slider .slick-active").removeClass("slick-active");

        setTimeout(function () {
            $(".hero-slider__wrapper").fadeIn();
            $(".hero-slider__image > span").fadeIn();
        }, 200);

        // Add 'slick-active' class back to the center slide after a one-second delay
        setTimeout(function () {
            $(".hero-slider .slick-current").addClass("slick-active");
        }, 800);
    });

    if (heroSlider.length > 0) {
        heroSlider.slick({
            centerMode: true,
            centerPadding: "50vh",
            slidesToShow: 1,
            dots: true,
            autoplay: true,
            autoplaySpeed: 4500,
            loop: true,
            speed: 850,
            pauseOnDotsHover: false,
            pauseOnFocus: false,
            pauseOnHover: false,
            responsive: [
                {
                    breakpoint: 1600,
                    settings: {
                        centerPadding: "150px",
                    },
                },
                {
                    breakpoint: 1100,
                    settings: {
                        dots: true,
                        centerMode: true,
                        centerPadding: "0",
                        slidesToShow: 1,
                    },
                },
            ],
        });
    }

    addSlideNumberToArrows(heroSlider);
});

function addSlideNumberToArrows(slider) {
    var currentSlideNumber = slider.slick("slickCurrentSlide") + 1;
    var prevArrow = slider.find(".slick-prev");
    var nextArrow = slider.find(".slick-next");
    prevArrow.addClass("slide-" + currentSlideNumber);
    nextArrow.addClass("slide-" + currentSlideNumber);
    slider.on("afterChange", function (event, slick, currentSlide) {
        currentSlideNumber = currentSlide + 1;
        prevArrow
            .removeClass(function (index, className) {
                return (className.match(/(^|\s)slide-\S+/g) || []).join(" ");
            })
            .addClass("slide-" + currentSlideNumber);
        nextArrow
            .removeClass(function (index, className) {
                return (className.match(/(^|\s)slide-\S+/g) || []).join(" ");
            })
            .addClass("slide-" + currentSlideNumber);
    });
}
