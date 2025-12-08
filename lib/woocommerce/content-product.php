<?php


// add custom button to product

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

add_action( 'woocommerce_after_shop_loop_item_title', 'addButtonToShop', 10 );

function addButtonToShop(){
  get_template_part('template-parts/content-product-button') ;
}



// add size from acf

add_action( 'woocommerce_after_shop_loop_item_title', 'addSizeToContentProduct', 5 );

function addSizeToContentProduct(){
  get_template_part('template-parts/single-product-content') ;
}



// add hover on image


add_action( 'woocommerce_before_shop_loop_item_title', 'add_on_hover_shop_loop_image' ) ; 

function add_on_hover_shop_loop_image() {

  $gallery_image_ids = wc_get_product()->get_gallery_image_ids();
  $image_id = end( $gallery_image_ids ); 

  if ( $image_id ) {
    echo wp_get_attachment_image( $image_id, 'large' ) ;
  } else {  //assuming not all products have galleries set
    echo wp_get_attachment_image( wc_get_product()->get_image_id(), 'large' ) ; 
  }
}

