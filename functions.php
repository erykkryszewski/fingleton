<?php
/**
 * This file adds functions to the theme.
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

if (!defined('PAGE_THEME_DIR')) {
  define('PAGE_THEME_DIR', get_theme_root() . '/' . get_template() . '/');
}

if (!defined('PAGE_THEME_URL')) {
  define('PAGE_THEME_URL', WP_CONTENT_URL . '/themes/' . get_template() . '/');
}

require_once(PAGE_THEME_DIR . 'lib/classes/svg-support.php');
require_once(PAGE_THEME_DIR . 'lib/classes/class-tgm-plugin-activation.php');
require_once(PAGE_THEME_DIR . 'lib/functions/required-plugins.php');
require_once(PAGE_THEME_DIR . 'lib/functions/search.php');
require_once(PAGE_THEME_DIR . 'lib/functions/image-object-fit.php');
require_once(PAGE_THEME_DIR . 'lib/functions/pay-online.php');
require_once(PAGE_THEME_DIR . 'lib/woocommerce/global-woocommerce.php');
require_once(PAGE_THEME_DIR . 'lib/woocommerce/my-account.php');
require_once(PAGE_THEME_DIR . 'lib/woocommerce/single-product.php');
require_once(PAGE_THEME_DIR . 'lib/woocommerce/checkout.php');
require_once(PAGE_THEME_DIR . 'lib/woocommerce/archive-product.php');
require_once(PAGE_THEME_DIR . 'lib/woocommerce/cart.php');
require_once(PAGE_THEME_DIR . 'lib/woocommerce/content-product.php');
require_once(PAGE_THEME_DIR . 'lib/custom-post-types/case-studies.php');

add_filter('upload_mimes', 'fingleton_svg_support');
/**
 * Adds SVG upload support
 *
 * @since 1.0.0
 *
 * @param array $mimes Mime types.
 * @return array
 */
function fingleton_svg_support($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

// Enable SVG in admin.
fingleton_SVG_Support::enable();

// Add theme supports
add_theme_support('html5');
add_theme_support('align-wide');
add_theme_support('title-tag');
add_theme_support('wp-block-styles');
add_theme_support('post-thumbnails');
add_theme_support('woocommerce');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');

// Add custom theme image sizes
add_image_size('square', 500, 500, ['center', 'center']);
add_image_size('full-width-image', 1920, 700, ['center', 'center']);
add_image_size('two-images', 700, 700, ['center', 'center']);
add_image_size('bottom-bar-sm', 32, 32, ['center', 'center']);
// Register Navigations
register_nav_menu('Navigation',__('Main navigation'));
register_nav_menu('Subpagenav',__('Subpage navigation'));

//ACF Config
require_once(PAGE_THEME_DIR . 'acf/config.php');

// Remove each style one by one
add_filter('woocommerce_enqueue_styles', function ($enqueue_styles) {
  unset($enqueue_styles[ 'woocommerce-general' ]);
  unset($enqueue_styles[ 'woocommerce-layout' ]);
  return $enqueue_styles;
});

/**
 * Enqeues scripts.
 *
 * @since 1.0.0
 */
add_action('wp_enqueue_scripts', function () {

  wp_dequeue_style('search-filter-plugin-styles');
  wp_deregister_style('search-filter-plugin-styles');

  $google_api_key = 'AIzaSyD_zLIJ5Jv7kYR22m2N7ds_9Uv-PeqbpUc';

  if ($google_api_key) { 
    wp_enqueue_script( 'google-maps-api-key', "https://maps.googleapis.com/maps/api/js?key=$google_api_key", [ 'jquery' ], "https://maps.googleapis.com/maps/api/js?key=$google_api_key", true); 
  }

	wp_enqueue_script('fingleton-main', get_stylesheet_directory_uri() . '/js/dist/main.js', [ 'jquery' ], filemtime(get_stylesheet_directory() . '/js/dist/main.js'), true);
	wp_enqueue_style('style', get_stylesheet_uri());

});

/**
 * Enqeues block editor assets
 *
 * @since 1.0.0
 */
add_action('enqueue_block_editor_assets', function () {
	wp_enqueue_script('fingleton-admin', get_stylesheet_directory_uri() . '/js/dist/editor.js', [ 'wp-data' ], filemtime(get_stylesheet_directory() . '/js/dist/editor.js'), true);
});

/**
 * Enqueue scripts for all admin pages.
 *
 * @since 1.0.0
 */
add_action('admin_enqueue_scripts', function () {
	if (is_admin()) {
		wp_enqueue_style('fingleton-admin', get_stylesheet_directory_uri() . '/style-editor.css', [], filemtime(get_stylesheet_directory() . '/style-editor.css'));
	}
});

/**
 * Deregister gravity forms recaptcha scripts.
 *
 * @since 1.0.1
 */
add_action( 'wp_footer', function () {

  wp_dequeue_script( 'gform_recaptcha' );
  wp_deregister_script( 'gform_recaptcha' );

} );


//Disable WordPress XMLRPC
add_filter('xmlrpc_enabled', '__return_false');

//Unset WordPress Pingbacks
add_filter('wp_headers', function ($headers) {
  unset($headers['X-Pingback']);
  return $headers;
});

// Post rename to Blog in admin sidebar menu
add_action('admin_menu', function () {
  global $menu;
  $menu[5][0] = _x('Blog', 'fingleton');
});

// add sidebar
add_action('widgets_init', function() {
  register_sidebar ([
    'id'            => 'fingleton-sidebar',
    'name'          => __('fingleton Sidebar'),
    'description'   => __('This is a blog sidebar.'),
    'before_widget' => '<div class="sidebar__item">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ]);
});

// Add Euro Sing in front of currency + fix decimal and thousands separator
add_filter( 'gform_currencies', function( $currencies ) {
  $currencies['EUR']['symbol_left']        = '&#8364;';
  $currencies['EUR']['symbol_right']       = '';
  $currencies['EUR']['decimals']           = 2;
  $currencies['EUR']['thousand_separator'] = ' ';
  $currencies['EUR']['decimal_separator']  = '.';
  return $currencies;
} );

// Remove Gravity Forms Thousands Separator
add_filter( 'gform_include_thousands_sep_pre_format_number', '__return_false' );

// Fix amount input
add_action( 'wp_footer', function () {
  ?>
<script type="text/javascript">
jQuery('.ginput_amount').on('change keyup blur focusout', function(event) {
  event.preventDefault();
  event.stopPropagation();
  let value = jQuery(this).val();
  jQuery(this).val(value.replace(',', '.'));
});
</script>
<?php

} );

/* deregister unused styles for non logged in users */

add_action('wp_print_styles', 'orcconsulting_remove_dashicons', 100);

function orcconsulting_remove_dashicons()
{
  if (!is_admin_bar_showing() && !is_customize_preview()) {
    wp_dequeue_style('dashicons');
    wp_deregister_style('dashicons');
  }
}

