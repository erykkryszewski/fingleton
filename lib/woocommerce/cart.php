<?php

add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');

function wc_refresh_mini_cart_count($fragments) {
  ob_start();
  $cart_items_number = WC()->cart->get_cart_contents_count();
  ?>
  <span class="<?php if($cart_items_number > 0) { echo 'active'; }?>" id="mini-cart-count"><?php echo esc_html($cart_items_number);?></span>
  <?php
      $fragments['#mini-cart-count'] = ob_get_clean();
  return $fragments;
}
