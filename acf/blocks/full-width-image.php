<?php

/**
 * ACF Block: Full width image
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$image = get_field('image');
$image_height = get_field('image_height');

?>

<div class="full-width-image" style="<?php if(!empty($image_height)) { echo 'height:'.esc_html($image_height).'px'; }?>">
  <?php echo wp_get_attachment_image($image, 'full', '', ["class" => "object-fit-cover"]); ?>
</div>