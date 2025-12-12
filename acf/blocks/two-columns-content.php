<?php 

/**
 * ACF Block: Two columns content
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$section_id = get_field('section_id');
$background = get_field('background');
$section_title = get_field('section_title');
$left_column_text = get_field('left_column_text');
$left_column_negative_margin = get_field('left_column_negative_margin');
$left_column_button = get_field('left_column_button');
$right_column_text = get_field('right_column_text');
$right_column_negative_margin = get_field('right_column_negative_margin');
$right_column_button = get_field('right_column_button');

?>

<div class="two-columns-content <?php if('true' == $background) { echo 'two-columns-content--background'; }?> <?php if('true' == $left_column_negative_margin) { echo 'two-columns-content--negative-margin'; }?> <?php if('true' == $right_column_negative_margin) { echo 'two-columns-content--negative-margin'; }?>">
  <?php if(!empty($section_id)):?>
    <div class="section-id" id="<?php echo esc_html($section_id);?>"></div>
  <?php endif;?>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="two-columns-content__item two-columns-content__item--left <?php if('true' == $left_column_negative_margin) { echo 'two-columns-content__item--negative-margin'; }?>">
            <?php echo apply_filters('the_title', $left_column_text);?>
            <?php if(!empty($left_column_button)):?>
                <a href="<?php echo esc_html($left_column_button['url']);?>" class="button two-columns-content__button hero-slider__button"><?php echo esc_html($left_column_button['title']);?></a>
            <?php endif;?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="two-columns-content__item two-columns-content__item--right <?php if('true' == $right_column_negative_margin) { echo 'two-columns-content__item--negative-margin'; }?>">
            <?php echo apply_filters('the_title', $right_column_text);?>
            <?php if(!empty($right_column_button)):?>
                <a href="<?php echo esc_html($right_column_button['url']);?>" class="button two-columns-content__button hero-slider__button"><?php echo esc_html($right_column_button['title']);?></a>
            <?php endif;?>
        </div>
      </div>
    </div>
  </div>
</div>
