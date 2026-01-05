<?php

/**
 * ACF Block: CTA with background
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$title = get_field('title');
$text = get_field('text');
$button = get_field('button');
$call_button = get_field('call_button');
$image = get_field('image');

$global_phone_number = get_field('global_phone_number', 'options');
$global_phone_number_display = get_field('global_phone_number_display', 'options');

?>

<div class="cta-with-background">
    <div class="cta-with-background__image"><?php echo wp_get_attachment_image($image, 'full', '', ['class' => 'object-fit-cover']); ?></div>
    <div class="container">
        <div class="cta-with-background__wrapper">
            <h3 class="cta-with-background__title"><?php echo apply_filters('the_title', $title); ?></h3>
            <?php if(!empty($text)): ?>
                <?php echo apply_filters('acf_the_content', $text); ?>
            <?php endif; ?>
            <?php if($call_button == 'false'): ?>
                <a href="<?php echo esc_html($button['url']); ?>" class="button cta-with-background__button"><?php echo esc_html($button['title']); ?></a>
            <?php else: ?>
                <a href="tel:<?php echo esc_html($global_phone_number); ?>" class="button cta-with-background__button"><?php esc_html_e('Call Now:', 'fingleton'); ?>&nbsp;<?php echo esc_html($global_phone_number_display); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>
