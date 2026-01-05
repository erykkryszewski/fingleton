import $ from "jquery";

$(window).scroll(function () {
    if ($(window).scrollTop() >= 50) {
        $(".header").addClass("header--fixed");
        $(".nav").addClass("nav--fixed");
    } else {
        $(".header").removeClass("header--fixed");
        $(".nav").removeClass("nav--fixed");
    }
});
