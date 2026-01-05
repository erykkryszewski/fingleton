<?php

/**
 * ACF Block: Button
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$button_text = get_field('button_text');
$button_link = get_field('button_link');
$centered_button = get_field('centered_button');

?>

<div class="blank-button">
    <div class="container">
        <div class="blank-button__wrapper <?php if('true' == $centered_button) { echo 'blank-button__wrapper--centered'; } ?>">
            <a href="<?php echo esc_url_raw($button_link); ?>" class="button"><?php echo esc_html($button_text); ?></a>
        </div>
    </div>
</div>
