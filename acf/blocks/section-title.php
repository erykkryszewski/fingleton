<?php

/**
 * ACF Block: Section title
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$title = get_field('title');
$scalable = get_field('scalable');
$gray_background = get_field('gray_background');

?>

<?php if(!empty($title)): ?>
    <div class="section-title <?php if('true' == $gray_background) { echo 'section-title--gray'; } ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title__item <?php if('true' == $scalable) { echo 'section-title__item--scalable'; } ?>"><?php echo apply_filters('the_title', $title); ?></h2>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
