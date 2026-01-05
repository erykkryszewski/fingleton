import $ from "jquery";

jQuery(function ($) {
    const pageHeroElementName = $(".page-hero");

    if (!pageHeroElementName.length) {
        return;
    }

    setTimeout(function () {
        pageHeroElementName.addClass("page-hero--blur-visible");
    }, 200);
});
