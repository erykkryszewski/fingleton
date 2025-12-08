<?php 

/**
 * ACF Block: Contact
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$title = get_field('title');
$text = get_field('text');
$location_info = get_field('location_info');

?>

<div class="contact">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="contact__intro">
          <div>
            <h1 class="contact__title"><?php echo apply_filters('the_title', $title);?></h1>
            <?php echo apply_filters('acf_the_content', $text);?>
          </div>
          <a href="#map" class="contact__link"></a>
        </div>
      </div>
    </div>
    <?php if(!empty($location_info)):?>
      <div class="contact__wrapper">
        <div class="row contact__row">
          <?php foreach($location_info as $key => $item):?>
            <div class="col-sm-6 col-lg-4">
              <div class="location-info location-info--contact">
                <div class="location-info__id" id="<?php echo esc_html($item['id']);?>"></div>
                <?php if(!empty($item['title'])):?>
                  <h2 class="location-info__title"><?php echo apply_filters('the_title', $item['title']);?></h2>
                <?php endif;?>
                <div class="location-info__content">
                  <?php if(!empty($item['address'])):?>
                    <span class="location-info__address"><?php esc_html_e('Address: ', 'fingleton');?><?php echo apply_filters('the_title', $item['address']);?></span>
                  <?php endif;?>
                  <?php if(!empty($item['phone'])):?>
                    <a class="location-info__phone" href="<?php echo esc_html($item['phone']['url']);?>"><?php esc_html_e('Phone: ', 'fingleton');?><span><?php echo esc_html($item['phone']['title']);?></span></a>
                  <?php endif;?>
                  <?php if(!empty($item['email'])):?>
                    <a class="location-info__email" href="<?php echo esc_html($item['email']['url']);?>"><?php esc_html_e('Email: ', 'fingleton');?><span><?php echo esc_html($item['email']['title']);?></span></a>
                  <?php endif;?>
                  <?php if(!empty($item['map'])):?>
                    <a class="location-info__map" href="<?php echo esc_html($item['map']['url']);?>"><?php echo esc_html($item['map']['title']);?></a>
                  <?php endif;?>
                  <?php if(!empty($item['website'])):?>
                    <a class="location-info__website" href="<?php echo esc_html($item['website']['url']);?>" target="_blank"><?php echo esc_html($item['website']['title']);?></a>
                  <?php endif;?>
                </div>
              </div>
            </div>
          <?php endforeach;?>
        </div>
      </div>
    <?php endif;?>
  </div>
</div>
