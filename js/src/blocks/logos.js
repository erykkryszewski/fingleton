import $ from "jquery";

$(document).ready(function () {
    if ($(".logos__items").length > 0) {
        $(".logos__items").slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 650,
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2500,
            responsive: [
                {
                    breakpoint: 1100,
                    settings: {
                        slidesToShow: 4,
                    },
                },
                {
                    breakpoint: 700,
                    settings: {
                        slidesToShow: 2,
                    },
                },
            ],
        });

        $(".slick-prev").text("");
        $(".slick-next").text("");
        $("ul.slick-dots > li > button").text("");
    }
});
