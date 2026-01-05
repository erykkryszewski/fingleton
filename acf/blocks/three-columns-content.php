<?php

/**
 * ACF Block: Pay Online Form
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$content = get_field('content');

?>

<?php if(!empty($content)): ?>
    <section class="three-columns-content">
        <div class="container">
            <div class="row">
                <?php foreach($content as $key => $item): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="three-columns-content__item">
                            <h3 class="three-columns-content__title"><?php echo apply_filters('the_title', $item['title']); ?></h3>
                            <?php echo apply_filters('the_title', $item['text']); ?>
                            <?php if(!empty($item['button'])): ?>
                                <a href="<?php echo esc_html($item['button']['url']); ?>" class="three-columns-content__link"><?php echo esc_html($item['button']['title']); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
