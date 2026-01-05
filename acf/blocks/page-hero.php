<?php

/**
 * ACF Block: Page Hero
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */


$title = get_field('title');
$text = get_field('text');
$buttons = get_field('buttons');
$background = get_field('background');

?>

<div class="page-hero">
    <?php if(!empty($background)) : ?>
        <div class="page-hero__background"><?php echo wp_get_attachment_image($background, 'full', '', ['class' => 'object-fit-cover'] ); ?></div>
    <?php else: ?>
        <div class="page-hero__background page-hero__background--plain"></div>
    <?php endif; ?>
    <div class="container">
        <div class="page-hero__wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-hero__content">
                        <?php if(!empty($title)): ?>
                            <h1 class="page-hero__title"><?php echo esc_html($title); ?></h1>
                        <?php endif; ?>
                        <?php if(!empty($text)): ?>
                            <div class="page-hero__text"><?php echo apply_filters('acf_the_content', $text); ?></div>
                        <?php endif; ?>
                        <?php if(!empty($buttons)): ?>
                            <div class="page-hero__buttons">
                                <?php foreach($buttons as $key => $item): ?>
                                    <?php $button_url = $item['button']['url']; $button_title = $item['button']['title']; $button_target = $item['button']['target'] ? $item['button']['target'] : '_self'; ?>
                                    <a class="button page-hero__button hero-slider__button" href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>"><?php echo esc_html($button_title); ?></a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
