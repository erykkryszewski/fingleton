<?php

/**
 * ACF Block: Achievements
 *
 * @package fingleton
 */

$section_id = get_field('section_id');
$title = get_field('title');
$description = get_field('description');
$cards = get_field('cards');


$gallery_image_top = get_field('gallery_image_top');
$gallery_text_top = get_field('gallery_text_top'); 
$gallery_image_small = get_field('gallery_image_small');
$gallery_image_big = get_field('gallery_image_big');
$gallery_text_bottom = get_field('gallery_text_bottom'); 
$button = get_field('button');

?>

<section class="achievements">
    <?php if(!empty($section_id)): ?>
        <div id="<?php echo esc_attr($section_id); ?>" class="section-anchor"></div>
    <?php endif; ?>

    <div class="container">
        <div class="row achievements__intro-row">
            <div class="col-12 col-lg-5">
                <?php if(!empty($title)): ?>
                    <h2 class="achievements__title"><?php echo apply_filters('the_title', $title); ?></h2>
                <?php endif; ?>
                <?php if(!empty($description)): ?>
                    <div class="achievements__description paragraph"><?php echo apply_filters('acf_the_content', $description); ?></div>
                <?php endif; ?>
            </div>

            <div class="col-12 col-lg-7">
                <?php if(!empty($cards)): ?>
                    <div class="achievements__cards">
                        <?php foreach($cards as $card): ?>
                            <div class="achievements__card">
                                <?php if(!empty($card['title'])): ?>
                                    <h3 class="achievements__card-title"><?php echo esc_html($card['title']); ?></h3>
                                <?php endif; ?>
                                <?php if(!empty($card['text'])): ?>
                                    <p class="achievements__card-text"><?php echo esc_html($card['text']); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="achievements__gallery">
            <div class="row achievements__gallery-row achievements__gallery-row--top">
                <div class="col-12 col-lg-6">
                    <div class="achievements__image-wrapper achievements__image-wrapper--wide"><?php echo wp_get_attachment_image($gallery_image_top, 'large', false, ['class' => 'img-fluid']); ?></div>
                </div>
                <div class="col-12 col-lg-5">
                    <?php if(!empty($gallery_text_top)): ?>
                        <h3 class="achievements__gallery-text h3"><?php echo apply_filters('the_title', $gallery_text_top); ?></h3>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row achievements__gallery-row achievements__gallery-row--bottom">
                <div class="col-12 col-lg-4">
                    <div class="achievements__column-content">
                        <div class="achievements__image-wrapper achievements__image-wrapper--small"><?php echo wp_get_attachment_image($gallery_image_small, 'medium', false, ['class' => 'img-fluid']); ?></div>

                        <?php if(!empty($gallery_text_bottom)): ?>
                            <h3 class="achievements__gallery-text achievements__gallery-text--bottom"><?php echo apply_filters('the_title', $gallery_text_bottom); ?></h3>
                        <?php endif; ?>
                        <?php if(!empty($button)): ?>
                            <a href="<?php echo esc_url($button['url']); ?>" class="button achievements__button hero-slider__button" target="<?php echo esc_attr($button['target'] ? $button['target'] : '_self'); ?>"><?php echo esc_html($button['title']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-12 col-lg-8">
                    <div class="achievements__image-wrapper achievements__image-wrapper--big"><?php echo wp_get_attachment_image($gallery_image_big, 'full', false, ['class' => 'img-fluid']); ?></div>
                </div>
            </div>
        </div>
    </div>
</section>
