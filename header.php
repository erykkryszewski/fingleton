<?php
/**
 * This file contains theme header elements
 *
 * @package boquip
 * @license GPL-3.0-or-later
 */


if(is_woocommerce_activated()) {
  global $woocommerce;
  $cart_items_number = $woocommerce->cart->get_cart_contents_count();
}

$global_phone_number = get_field('global_phone_number', 'options');
$global_phone_number_display = get_field('global_phone_number_display', 'options');
$global_logo = get_field('global_logo', 'options');
$subpage_logo = get_field('subpage_logo', 'options');
$global_email = get_field('global_email', 'options');
$global_terms_and_conditions = get_field('global_terms_and_conditions', 'options');
$global_privacy_policy = get_field('global_privacy_policy', 'options');
$global_social_media = get_field('global_social_media', 'options');
$header_button = get_field('header_button', 'options');

$left_submenu_title = get_field('left_submenu_title', 'options');
$left_submenu_subtitle = get_field('left_submenu_subtitle', 'options');
$left_submenu_items = get_field('left_submenu_items', 'options');

$right_submenu_title = get_field('right_submenu_title', 'options');
$right_submenu_subtitle = get_field('right_submenu_subtitle', 'options');
$right_submenu_items = get_field('right_submenu_items', 'options');

$body_classes = get_body_class();
$page_url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

?>

<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1" />
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body <?php body_class('main-body'); ?> >
  <div class="preloader">
    <!-- <?php if(!empty($global_logo)):?>
      <div class="preloader__logo">
        <?php echo wp_get_attachment_image($global_logo, 'logo-sign', '', ['class' => 'object-fit-contain']);?>
      </div>
    <?php endif;?> -->
  </div>
  <header class="header <?php if(!is_front_page()) { echo 'header--subpage'; } ?>">
    <nav class="nav <?php if(!is_front_page()) { echo 'nav--subpage'; } ?>">
      <div class="container-fluid container-fluid--padding nav__container">
        <?php if(is_front_page()):?>
          <a href="/" class="nav__logo">
            <?php echo wp_get_attachment_image($global_logo, 'logo-sign', '', ["class" => ""]); ?>
          </a>
        <?php else:?>
          <a href="/" class="nav__logo">
            <?php echo wp_get_attachment_image($subpage_logo, 'logo-sign', '', ["class" => ""]); ?>
          </a>
        <?php endif;?>
        <button class="hamburger nav__button <?php if(!is_front_page()) { echo 'nav__button--subpage'; } ?>">Menu</button>

        <div class="nav__wrapper">
          <div class="nav__content">
            <div class="row nav__row m-0">
              <div class="col-lg-3 p-0">
                <?php echo wp_nav_menu(['theme_location' => 'Navigation', 'container' => 'ul', 'menu_class' => 'nav__menu']);?>
              </div>
              <div class="col-lg-9 p-0">
                <div class="nav__submenu">
                  <?php if(!empty($left_submenu_items) && is_array($left_submenu_items)):?>
                    <div>
                      <?php if(!empty($left_submenu_title)):?>
                        <h2 class="nav__title"><?php echo esc_html($left_submenu_title);?></h2>
                      <?php endif;?>
                      <?php if(!empty($left_submenu_subtitle)):?>
                        <h3 class="nav__subtitle"><?php echo esc_html($left_submenu_subtitle);?></h3>
                      <?php endif;?>
                      <ul class="nav__items">
                        <?php foreach($left_submenu_items as $key => $item):?>
                          <li><a href="<?php echo esc_html($item['link']['url']);?>"><?php echo esc_html($item['link']['title']);?></a></li>
                        <?php endforeach;?>
                      </ul>
                    </div>
                  <?php endif;?>
                  <?php if(!empty($right_submenu_items) && is_array($right_submenu_items)):?>
                    <div>
                      <?php if(!empty($right_submenu_title)):?>
                        <h2 class="nav__title"><?php echo esc_html($right_submenu_title);?></h2>
                      <?php endif;?>
                        <h3 class="nav__subtitle"><?php echo esc_html($right_submenu_subtitle);?></h3>
                      <ul class="nav__items">
                        <?php foreach($right_submenu_items as $key => $item):?>
                          <li><a href="<?php echo esc_html($item['link']['url']);?>"><?php echo esc_html($item['link']['title']);?></a></li>
                        <?php endforeach;?>
                      </ul>
                    </div>
                  <?php endif;?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
	</header>
