<?php

/**
 * ACF Block: Thank You
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$content = get_field('content');

?>

<section class="block block-thank-you">
  <div class="container">
    <div class="thank-you">
      <?php echo apply_filters('acf_the_content', $content); ?>
    </div>
  </div>
</section>