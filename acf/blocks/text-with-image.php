<?php

/**
 * ACF Block: Text with image
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$section_id = get_field('section_id');
$title = get_field('title');
$text = get_field('text');
$list = get_field('list');
$image = get_field('image');
$image_size = get_field('image_size');
$image_class = get_field('image_class');
$direction = get_field('direction');
$gray_background = get_field('gray_background');
$image_decorator = get_field('image_decorator');
$button = get_field('button');
$list = get_field('list');

?>

<div class="text-with-image <?php if(!empty($image_decorator)) { echo 'text-with-image--padding'; } ?>">
    <?php if(!empty($section_id)): ?>
        <div class="section-id" id="<?php echo esc_html($section_id); ?>"></div>
    <?php endif; ?>
    <div class="container">
        <div class="row text-with-image__row <?php if('reverse' == $direction) { echo 'text-with-image__row--reverse'; } ?>">
            <div class="col-12 col-lg-6">
                <?php if(!empty($title)): ?>
                    <h2 class="text-with-image__title"><?php echo apply_filters('the_title', $title); ?></h2>
                <?php endif; ?>
                <?php echo apply_filters('acf_the_content', $text); ?>
                <?php if(!empty($list)): ?>
                    <ul class="text-with-image__list">
                        <?php foreach($list as $key => $item): ?>
                            <li><?php echo esc_html($item['text']); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if(!empty($button)): ?>
                    <a href="<?php echo esc_html($button['url']); ?>" class="button text-with-image__button"><?php echo esc_html($button['title']); ?></a>
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-6">
                <div class="text-with-image__picture <?php if('reverse' == $direction) { echo 'text-with-image__picture--reverse'; } ?>
                <?php if('bigger' == $image_size) { echo 'text-with-image__picture--bigger'; } ?>">
                <?php echo wp_get_attachment_image($image, 'full', '', ['class' => $image_class]); ?>
                <div class="text-with-image__decorator"><?php echo wp_get_attachment_image($image_decorator, 'full', '', ['class' => '']); ?></div>
            </div>
        </div>
    </div>
</div>
</div>
