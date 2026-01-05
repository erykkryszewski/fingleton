<?php

/**
 * ACF Block: Shortcode
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$shortcode = get_field('shortcode');

?>

<div class="container"><?php echo do_shortcode($shortcode); ?></div>
