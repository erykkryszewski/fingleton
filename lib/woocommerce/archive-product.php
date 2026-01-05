<?php

$url = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];

// remove custom filtration and add new one

remove_action("woocommerce_before_shop_loop", "woocommerce_catalog_ordering", 30);

function addShopFiltration() {
    get_template_part("template-parts/shop-filtration");
}

if (strpos($url, "product/") == false) {
    add_action("woocommerce_before_main_content", "addShopFiltration", 30);
}

// remove woocommerce default header

add_filter("woocommerce_show_page_title", "__return_false");

// add shop header

function addShopHeader() {
    get_template_part("template-parts/shop-hero");
}

if (strpos($url, "product/") == false) {
    add_action("woocommerce_before_main_content", "addShopHeader", 10);
}

// add newsletter to archive pages

function addNewsletter() {
    get_template_part("acf/blocks/newsletter");
}

if (strpos($url, "product/") == false) {
    add_action("woocommerce_after_main_content", "addNewsletter", 10);
}
