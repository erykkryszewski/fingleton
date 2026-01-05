<?php

/**
 * ACF Block: Border divider
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$direction = get_field('direction');

?>

<div class="border-divider border-divider--<?php echo esc_html($direction); ?>"></div>
