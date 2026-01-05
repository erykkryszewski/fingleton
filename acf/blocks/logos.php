<?php

/**
 * ACF Block: Logos
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$title = get_field('title');
$logos = get_field('logos');

?>

<div class="logos">
    <div class="container">
        <div class="logos__wrapper">
            <div class="logos__items">
                <?php foreach($logos as $key => $item): ?>
                    <a href="<?php echo esc_url_raw($item['link']); ?>" class="logos__image"><?php echo wp_get_attachment_image($item['image'], 'full', '', ['class' => '']); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
