<?php 

/**
 * ACF Block: Pay Online Form
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$title = get_field('title');
$shortcode = get_field('shortcode');

?>

<section class="block block-pay-online">
  <div class="container">
    <div class="pay-online">
      <?php if ($title):?>
        <h2 class="fancy-title"><?php echo apply_filters('the_title', $title); ?></h2>
      <?php endif; ?>
      <?php if ($shortcode):?>
        <?php echo do_shortcode($shortcode); ?>
      <?php endif; ?>
    </div>
  </div>
</section>