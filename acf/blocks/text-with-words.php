<?php 

/**
 * ACF Block: Text with words
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$section_id = get_field('section_id');
$background = get_field('background');
$words_upper = get_field('words_upper');
$title = get_field('title');
$subtitle = get_field('subtitle');
$left_column_text = get_field('left_column_text');
$sentence_one = get_field('sentence_one');
$sentence_two = get_field('sentence_two');

?>

<div class="text-with-words <?php if('true' == $background) { echo 'text-with-words--background'; }?>">
  <?php if(!empty($section_id)):?>
    <div class="section-id" id="<?php echo esc_html($section_id);?>"></div>
  <?php endif;?>
  <div class="container-fluid text-with-words__container">
    <div class="row">
      <div class="col-xl-3 desktop-only">
        <?php if(!empty($subtitle)):?>
          <div class="text-with-words__decorator"></div>
        <?php endif;?>
      </div>
      <div class="col-xl-3 col-lg-6">
        <?php if(!empty($subtitle)):?>
          <span class="text-with-words__subtitle"><?php echo apply_filters('the_title', $subtitle);?></span>
        <?php endif;?>
        <?php if(!empty($title)):?>
          <h2 class="text-with-words__title"><?php echo apply_filters('the_title', $title);?></h2>
        <?php endif;?>
        <?php echo apply_filters('acf_the_content', $left_column_text);?>
      </div>
      <?php if(!empty($sentence_one) && !empty($sentence_two)):?>
        <div class="col-xl-6">
          <div class="animated-words text-with-words__animated-words <?php if('true' == $words_upper) { echo 'text-with-words__animated-words--upper'; }?>">
            <div class="animated-words__item animated-words__item--one">
              <?php echo wp_get_attachment_image($sentence_one, 'full');?>
            </div>
            <div class="animated-words__item animated-words__item--two">
              <?php echo wp_get_attachment_image($sentence_two, 'full');?>
            </div>
          </div>
        </div>
      <?php endif;?>
    </div>
  </div>
</div>