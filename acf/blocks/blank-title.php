<?php

/**
 * ACF Block: Blank Title
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$blank_title = get_field('blank_title');

?>

<div class="blank-title">
    <div class="container">
        <h2><?php if(empty($blank_title)) { echo wp_title(''); } else { echo apply_filters('the_title', $blank_title); } ?></span></h2>
</div>
</div>
