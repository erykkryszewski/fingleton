<?php

/**
 * ACF Block: Testimonials
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$title = get_field('testimonials_title', 'options');
$text = get_field('testimonials_text', 'options');
$testimonials = get_field('testimonials', 'options');
$background = get_field('background');

?>

<?php if(!empty($testimonials)):?>
  <div class="testimonials <?php if(!empty($background)) { echo 'testimonials--background'; }?>">
    <?php if(!empty($background)):?>
      <div class="testimonials__background">
        <?php echo wp_get_attachment_image($background, 'full', '', ['class' => 'object-fit-cover']);?>
      </div>
    <?php endif;?>
    <div class="container">
      <div class="testimonials__wrapper">
        <div class="row">
          <div class="col-lg-4">
            <div class="testimonials__content">
              <h2 class="testimonials__title"><?php echo apply_filters('the_title', $title);?></h2>
              <?php echo apply_filters('the_title', $text);?>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="testimonials__slider">
              <?php foreach($testimonials as $key => $item):?>
                <div class="testimonials__item">
                  <?php echo apply_filters('the_title', $item['text']);?>
                    <h3 class="testimonials__author"><?php echo apply_filters('the_title', $item['author']);?></h3>
                </div>
              <?php endforeach;?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif;?>