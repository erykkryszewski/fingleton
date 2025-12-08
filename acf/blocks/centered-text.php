<?php 

/**
 * ACF Block: Centered text
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$text = get_field('text');

?>

<div class="centered-text">
  <div class="container">
    <?php echo apply_filters('acf_the_content', $text);?>
  </div>
</div>