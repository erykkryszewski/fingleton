<?php

/**
 * ACF Block: Content with buttons
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$content = get_field('content');
$buttons = get_field('buttons');
$background = get_field('background');

?>

<div class="content-with-buttons <?php if('true' == $background) { echo 'content-with-buttons--background'; } ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="content-with-buttons__text"><?php echo apply_filters('the_title', $content); ?></div>
            </div>
            <?php if(!empty($buttons)): ?>
                <div class="col-md-6">
                    <div class="content-with-buttons__buttons-wrapper">
                        <?php foreach($buttons as $key => $item): ?>
                            <a href="<?php echo esc_html($item['button']['url']); ?>" class="button content-with-buttons__button"><?php echo esc_html($item['button']['title']); ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
