<?php

/**
 * ACF Block: Theme Embed
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$embed_code = get_field('embed_code');
$second_embed_code = get_field('second_embed_code');

?>

<div class="theme-embed">
    <div class="container">
        <div class="row">
            <div class="col-md-6 <?php if(empty($second_embed_code)) { echo 'offset-md-3'; } ?>">
                <div class="theme-embed__content"><?php echo apply_filters('the_title', $embed_code); ?></div>
            </div>
            <?php if(empty(!$second_embed_code)): ?>
                <div class="col-md-6"><?php echo apply_filters('the_title', $second_embed_code); ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>
