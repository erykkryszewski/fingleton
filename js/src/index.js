/**
 * External dependencies
 */
import $ from "jquery";
import AOS from "aos";
import "slick-carousel";
import "@fancyapps/fancybox";
// import 'parallax-js';

document.addEventListener("DOMContentLoaded", function () {
	const themeImages = document.querySelectorAll('img[sizes^="auto,"]');
	themeImages.forEach(function (img) {
		img.sizes = img.sizes.replace(/^auto,\s*/, "");
	});
});

AOS.init();

$(window).on("load", function () {
	AOS.refresh();
	setTimeout(function () {
		$(".preloader").fadeOut();
	}, 100);

	if (
		$(".subpage-hero").length > 0 &&
		window.location.href.indexOf("sfid") < 0
	) {
		$("html, body")
			.delay(0)
			.animate(
				{
					scrollTop: $("#subpage-hero-scroll-to").offset().top,
				},
				1000
			);
	}
});

$("p:empty").remove();

import "./global/recaptcha";

import "./sections/header";
import "./sections/navigation";
// import './sections/pay-online';
// import './sections/projects-archive';
import "./sections/project";

// import './blocks/logos';
// import './blocks/faq';
// import './blocks/numbers';
import "./blocks/testimonials";
import "./blocks/hero";
// import './blocks/slider-with-content';
import "./blocks/map";
import "./blocks/contact";
import "./blocks/gallery";
import "./blocks/timeline";
import "./blocks/location-info";
import "./blocks/page-hero";

import "./components/cookies";
import "./components/section-title";
import "./components/spacer";

// import './woocommerce/archive-product';
// import './woocommerce/single-product';
// import './woocommerce/content-product';
// import './woocommerce/product-info';
