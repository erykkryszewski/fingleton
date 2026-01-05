<?php

/**
 * ACF Block: Big image wyswig content
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$image = get_field('image');
$content = get_field('content');

?>

<div class="big-image-wyswig-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="big-image-wyswig-content__image-wrapper">
                    <div class="big-image-wyswig-content__picture"><?php echo wp_get_attachment_image($image, 'full', '', ['class' => 'object-fit-cover']); ?></div>
                </div>
            </div>
            <div class="col-md-6 col-xl-8">
                <div class="big-image-wyswig-content__text"><?php echo apply_filters('the_title', $content); ?></div>
            </div>
        </div>
    </div>
</div>
