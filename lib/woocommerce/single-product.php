<?php

// single product content order change, move the product description below the add to cart button

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 40 );




// replace product short description with product description, then hide short description

add_filter('woocommerce_short_description', 'custom_wc_short_description', 10, 1);
add_filter('woocommerce_product_excerpt', 'custom_wc_short_description', 10, 1);

function custom_wc_short_description($short_description) {
  global $post;
  $product = wc_get_product($post->ID);
  if ($product && !is_wp_error($product)) {
    $description = $product->get_description();
    if (!empty($description)) {
      $short_description = wpautop(do_shortcode($description));
    }
  }
  return $short_description;
}

add_action('admin_head', 'custom_hide_short_description_field');
function custom_hide_short_description_field() {
  global $pagenow;
  if ($pagenow === 'post.php' && get_post_type() === 'product') {
    echo '<style>#postexcerpt { display: none; }</style>';
  }
}



// add size from acf

add_action( 'woocommerce_single_product_summary', 'addSizeFromACF', 5 );

function addSizeFromACF(){
  get_template_part('template-parts/single-product-content') ;
}



// add tabs from acf

add_action( 'woocommerce_after_single_product_summary', 'addInfo', 5 );

function addInfo(){
  get_template_part('template-parts/single-product-summary') ;
}
