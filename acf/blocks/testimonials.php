<?php

$section_id = get_field('section_id'); $title = get_field('title'); $list = get_field('list');

?>

<section class="testimonials">
    <?php if(!empty($section_id)): ?>
        <div id="<?php echo esc_attr($section_id); ?>" class="section-anchor"></div>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4">
                <?php if(!empty($title)): ?>
                    <div class="testimonials__title-wrapper">
                        <h2 class="testimonials__title"><?php echo apply_filters('the_title', $title); ?></h2>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-12 col-lg-7 offset-lg-1">
                <div class="testimonials__box">
                    <?php if(!empty($list)): ?>
                        <div class="testimonials__slider">
                            <?php foreach($list as $item): ?>
                                <div class="testimonials__slide">
                                    <div class="testimonials__quote"><?php echo esc_html($item['text']); ?></div>

                                    <div class="testimonials__author">
                                        <div class="testimonials__author-image"><?php echo wp_get_attachment_image($item['image'], 'thumbnail', false, ['class' => 'object-fit-cover']); ?></div>
                                        <div class="testimonials__author-info">
                                            <div class="testimonials__author-name"><?php echo esc_html($item['name']); ?></div>
                                            <div class="testimonials__author-role"><?php echo esc_html($item['role']); ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="testimonials__controls">
                            <button type="button" class="testimonials__arrow testimonials__arrow--prev">
                                <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.5 1L1.5 8L8.5 15" stroke="#232323" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <button type="button" class="testimonials__arrow testimonials__arrow--next">
                                <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.5 1L8.5 8L1.5 15" stroke="#232323" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
