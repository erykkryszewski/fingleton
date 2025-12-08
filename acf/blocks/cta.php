<?php 

/**
 * ACF Block: CTA
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$title = get_field('title');
$text = get_field('text');
$button = get_field('button');
$call_button = get_field('call_button');

$global_phone_number = get_field('global_phone_number', 'options');
$global_phone_number_display = get_field('global_phone_number_display', 'options');

?>

<div class="cta">
  <div class="container">
    <div class="cta__wrapper">
      <div class="row cta__row">
        <div class="col-md-8">
          <div class="cta__content">
            <h3 class="cta__title"><?php echo apply_filters('the_title', $title);?></h3>
            <?php if(!empty($text)):?>
              <?php echo apply_filters('acf_the_content', $text);?>
            <?php endif;?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="cta__link-wrapper">
            <?php if($call_button == 'false'):?>
              <a href="<?php echo esc_html($button['url']);?>" class="button cta__button "><?php echo esc_html($button['title']);?></a>
            <?php else:?>
              <a href="tel:<?php echo esc_html($global_phone_number);?>" class="button cta__button"><?php esc_html_e('Call Now:', 'fingleton');?>&nbsp;<?php echo esc_html($global_phone_number_display);?></a>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>