import $ from "jquery";

$.fn.isInViewport = function () {
    var elementTop = $(this).offset().top + 200;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};

$(window).on("resize scroll", function () {
    let titles = $(".section-title--scalable");

    $(titles).each(function (index, val) {
        if ($(val).isInViewport()) {
            resizeTitle(val);
        }
    });
});

function resizeTitle(val) {
    let offsetTop = $(val).offset().top;
    let scrollTop = $(window).scrollTop();
    let difference = offsetTop - scrollTop;

    let viewportHeight = $(window).height();
    let maxFontSize = 20 * 1.5;
    let animatedFontSize = 20;
    let scaleSize = 100 - (difference / viewportHeight) * 100;

    animatedFontSize = 20 + (20 * scaleSize) / 100;

    if (animatedFontSize < 20) {
        animatedFontSize = 20;
    } else if (animatedFontSize > 30) {
        animatedFontSize = maxFontSize;
    }

    $(val).css("font-size", animatedFontSize + "px");
}
