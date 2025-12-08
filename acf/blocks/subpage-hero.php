<?php

/**
 * ACF Block: Subpage hero
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$background = get_field('background');
$title = get_field('title');
$text = get_field('text');
$button = get_field('button');

?>

<div class="subpage-hero">
  <div class="subpage-hero__image" style="background: url('<?php echo esc_html($background);?>') center/cover no-repeat;">
    <span></span>
  </div>
  <div class="container subpage-hero__container">
    <div class="subpage-hero__wrapper">
      <div class="subpage-hero__content">
        <h1 class="subpage-hero__title"><?php echo apply_filters('the_title', $title);?></h1>
        <?php echo apply_filters('acf_the_content', $text);?>
        <?php if(!empty($button)):?>
          <a href="<?php echo esc_html($button['url']);?>" class="button subpage-hero__button"><?php echo esc_html($button['title']);?></a>
        <?php endif;?>
      </div>
    </div>
  </div>
</div>

