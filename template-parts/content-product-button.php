<?php

global $product; ?>

<div class="product__buttons-wrapper">
  <a href="<?php echo get_permalink(
      $product->get_id(),
  ); ?>" class="button product__button">Quick buy</a>
</div>
