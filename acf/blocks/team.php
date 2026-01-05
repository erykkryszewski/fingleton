<?php

/**
 * ACF Block: Team
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$team = get_field('team');

?>

<?php if(!empty($team)): ?>
    <div class="team">
        <div class="container">
            <div class="team__wrapper">
                <div class="row">
                    <?php foreach($team as $key => $item): ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="team__item">
                                <div class="team__image <?php if($item['image_class'] == 'object-fit-contain') { echo 'team__image--padding'; } ?>"><?php echo wp_get_attachment_image($item['image'], 'team-image', '', ['class' => $item['image_class']] ); ?></div>
                                <div class="team__content">
                                    <h3 class="team__title"><?php echo apply_filters('the_title', $item['title']); ?></h3>
                                    <?php echo apply_filters('acf_the_content', $item['text']); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
