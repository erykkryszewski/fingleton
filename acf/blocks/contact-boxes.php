<?php 

/**
 * ACF Block: Contact boxes
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$global_phone_number = get_field('global_phone_number', 'options');
$global_phone_number_display = get_field('global_phone_number_display', 'options');
$global_email = get_field('global_email', 'options');
$global_address = get_field('global_address', 'options');

?>

<div class="contact-boxes">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-lg-4">
        <div class="contact-boxes__item">
          <a href="tel:<?php echo esc_html($global_phone_number);?>" class="contact-boxes__title contact-boxes__title--phone"><?php esc_html_e('Phone number', 'fingleton');?></a>
          <a href="tel:<?php echo esc_html($global_phone_number);?>" class="contact-boxes__phone"><?php echo esc_html($global_phone_number_display);?></a>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="contact-boxes__item">
          <a href="mailto:<?php echo esc_html($global_email);?>" class="contact-boxes__title contact-boxes__title--email"><?php esc_html_e('Email Adress', 'fingleton');?></a>
          <a href="mailto:<?php echo esc_html($global_email);?>" class="contact-boxes__email"><?php echo esc_html($global_email);?></a>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="contact-boxes__item">
          <h3 class="contact-boxes__title contact-boxes__title--adress"><?php esc_html_e('Office Adress', 'fingleton');?></h3>
          <div class="contact-boxes__adress">
            <?php echo apply_filters('acf_the_content', $global_address);?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

