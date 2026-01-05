<?php

/**
 * ACF Block: Numbers
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */


$title = get_field('title');
$text = get_field('text');
$numbers_item = get_field('numbers_item');

?>

<div class="numbers">
    <div class="section-id" id="zapisz-sie"></div>
    <div class="container">
        <div class="numbers__wrapper">
            <?php foreach($numbers_item as $key => $item): ?>
                <div class="numbers__item" id="numbers__item1">
                    <?php if(!empty($item['link_direction'])): ?>
                        <a href="<?php esc_url_raw($item['link_direction']); ?>">
                            <?php if(!empty($item['icon'])): ?>
                                <div class="numbers__icon"><?php echo wp_get_attachment_image($item['icon'], 'numbers-icon', '', ['class' => '']); ?></div>
                            <?php endif; ?>
                            <span class="numbers__digit" data-count="<?php echo $item['number']; ?>" id="numbers__digit1">000</span>
                            <p class="numbers__title"><?php echo $item['title']; ?></p>
                        </a>
                    <?php else: ?>
                        <?php if(!empty($item['icon'])): ?>
                            <div class="numbers__icon"><?php echo wp_get_attachment_image($item['icon'], 'numbers-icon', '', ['class' => '']); ?></div>
                        <?php endif; ?>
                        <span class="numbers__digit" data-count="<?php echo $item['number']; ?>" id="numbers__digit1">000</span>
                        <p class="numbers__title"><?php echo $item['title']; ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
