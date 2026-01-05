<?php

/**
 * ACF Block: Inner Blocks Test
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$title = get_field('title');

?>

<div class="inner-blocks-test">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?php echo esc_html($title); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <InnerBlocks />
            </div>
        </div>
    </div>
</div>
