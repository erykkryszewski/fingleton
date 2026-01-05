<?php

/**
 * ACF Block: FAQ
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$faq = get_field('faq');
$section_id = get_field('section_id');

?>

<?php if(!empty($faq)): ?>
    <div class="faq">
        <div class="section-id" id="<?php echo esc_html($section_id); ?>"></div>
        <div class="container">
            <div class="faq__wrapper">
                <?php foreach($faq as $key => $item): ?>
                    <div class="faq__item">
                        <div class="row">
                            <div class="col-lg-4">
                                <h3 class="faq__question"><?php echo apply_filters('the_title', $item['question']); ?></h3>
                            </div>
                            <div class="col-lg-8">
                                <div class="faq__answer"><?php echo apply_filters('acf_the_content', $item['answer']); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
