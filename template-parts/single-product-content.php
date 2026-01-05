<?php

// current product fields
$product_size = get_field("product_size", get_the_ID());
$how_much_to_save = get_field("how_much_to_save", get_the_ID());
$free_delivery = get_field("free_delivery", get_the_ID());
?>

<?php if (!empty($product_size)): ?>
<span class="product__size"><?php echo esc_html($product_size); ?></span>
<?php endif; ?>

<?php if (!empty($how_much_to_save)): ?>
  <span class="product__save"><?php echo esc_html($how_much_to_save); ?></span>
<?php endif; ?>

<?php if ($free_delivery == "true"): ?>
  <span class="product__free-delivery"><?php esc_html_e("Free delivery", "omahony"); ?></span>
<?php endif; ?>
