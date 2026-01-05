<?php

/**
 * ACF Block: Homepage hero
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$slider = get_field('slider');

?>

<?php if(!empty($slider)): ?>
    <div class="hero-slider">
        <?php foreach($slider as $key => $item): ?>
            <div class="hero-slider__item">
                <div class="hero-slider__image" style="background: url(&quot;<?php echo esc_html($item['background']); ?>&quot;) center/cover no-repeat">
                    <span></span>
                </div>
                <div class="hero-slider__wrapper">
                    <div class="hero-slider__content">
                        <?php if(!empty($item['icon'])): ?>
                            <div class="hero-slider__icon"><?php echo wp_get_attachment_image($item['icon'], 'large'); ?></div>
                        <?php endif; ?>
                        <?php if($key == 0): ?>
                            <h1 class="hero-slider__title"><?php echo apply_filters('the_title', $item['title']); ?></h1>
                        <?php else: ?>
                            <h2 class="hero-slider__title"><?php echo apply_filters('the_title', $item['title']); ?></h2>
                        <?php endif; ?>
                        <?php echo apply_filters('acf_the_content', $item['text']); ?>
                        <?php if(!empty($item['button'])): ?>
                            <a href="<?php echo esc_html($item['button']['url']); ?>" class="button hero-slider__button"><?php echo esc_html($item['button']['title']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
