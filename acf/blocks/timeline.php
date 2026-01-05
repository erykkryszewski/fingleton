<?php

$background = get_field('background'); $timeline = get_field('timeline');

?>

<?php if(!empty($timeline)): ?>
    <div class="timeline <?php if($background == 'true') { echo 'timeline--background'; } ?>">
        <?php if(!empty($section_id)): ?>
            <div class="section-id" id="<?php echo esc_html($section_id); ?>"></div>
        <?php endif; ?>

        <div class="timeline__wrapper">
            <div class="timeline__slider">
                <?php foreach($timeline as $key => $item): ?>
                    <div class="timeline__item">
                        <div class="timeline__top">
                            <span class="timeline__year"><?php echo esc_html($item['year']); ?></span>
                            <span class="timeline__dot"></span>
                            <span class="timeline__line"></span>
                        </div>
                        <div class="timeline__image"><?php echo wp_get_attachment_image($item['image'], 'full', '', ['class' => 'object-fit-cover']); ?></div>
                        <h3 class="timeline__title"><?php echo apply_filters('the_title', $item['title']); ?></h3>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
