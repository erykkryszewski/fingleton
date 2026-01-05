<?php

$taxonomy_name = get_the_archive_title();
$shop_hero_title = get_field("shop_hero_title", "options");
$shop_hero_text = get_field("shop_hero_text", "options");
$shop_hero_button = get_field("shop_hero_button", "options");
?>



<div class="shop-hero">
  <h1 class="shop-hero__title"><?php echo apply_filters("the_title", $shop_hero_title); ?></h1>
  <?php echo apply_filters("acf_the_content", $shop_hero_text); ?>
</div>
