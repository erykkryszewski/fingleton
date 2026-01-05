import $ from "jquery";

$(document).ready(function () {
    $(".products > li > a > img").each(function () {
        $(this).wrap('<div class="product__image"></div>');
    });

    $(".products > li > a.button.add_to_cart_button").each(function () {
        $(this).wrap('<div class="product__button-wrapper"></div>');
    });
});
