<?php 

/**
 * ACF Block: Two images
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$left_image = get_field('left_image');
$left_image_height = get_field('left_image_height');
$right_image = get_field('right_image');
$right_image_height = get_field('right_image_height');
$background = get_field('background');

?>

<div class="two-images <?php if($background == 'true') { echo 'two-images--background'; } ?>">
  <div class="two-images__picture" style="<?php if(!empty($left_image_height)) { echo 'height:'.esc_html($left_image_height).'px'; }?>">
    <?php echo wp_get_attachment_image($left_image, 'full', '', ['class' => 'object-fit-cover']);?>
  </div>
  <div class="two-images__picture" style="<?php if(!empty($right_image_height)) { echo 'height:'.esc_html($right_image_height).'px'; }?>">
    <?php echo wp_get_attachment_image($right_image, 'full', '', ['class' => 'object-fit-cover']);?>
  </div>
</div>