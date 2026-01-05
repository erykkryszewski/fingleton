<?php

/**
 * ACF Block: Two columns text
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$section_id = get_field('section_id');
$background = get_field('background');
$section_title = get_field('section_title');
$left_column_text = get_field('left_column_text');
$right_column_text = get_field('right_column_text');

?>

<div class="two-columns-text <?php if('true' == $background) { echo 'two-columns-text--background'; } ?>">
    <?php if(!empty($section_id)): ?>
        <div class="section-id" id="<?php echo esc_html($section_id); ?>"></div>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if(!empty($section_title)): ?>
                    <h2 class="two-columns-text__title"><?php echo apply_filters('the_title', $section_title); ?></h2>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6"><?php echo apply_filters('acf_the_content', $left_column_text); ?></div>
            <div class="col-md-6"><?php echo apply_filters('acf_the_content', $right_column_text); ?></div>
        </div>
    </div>
</div>
