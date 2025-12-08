<?php 

/**
 * ACF Block: Three images
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */


$title = get_field('title');
$images = get_field('images');
$link = get_field('link');
$section_id = get_field('section_id');



?>

<div class="three-images">
  <?php if(!empty($section_id)):?>
    <div class="section-id" id="<?php echo esc_html($section_id);?>"></div>
  <?php endif;?>
  <div class="container">
    <h3 class="three-images__title"><?php echo esc_html($title);?></h3>
    <div class="row">
      <?php foreach($images as $key => $item):?>
        <div class="col-md-6 col-lg-4 three-images__column <?php if($key > 2) { echo 'three-images__column--hidden'; }?>">
          <a href="<?php echo wp_get_attachment_image_url($item['image'], 'full');?>" class="three-images__item" data-fancybox="<?php echo esc_html($section_id);?>">
            <?php if(!empty($item['image_class'])):?>
              <?php echo wp_get_attachment_image($item['image'], 'full', '', ['class' => $item['image_class']]);?>
            <?php else:?>
              <?php echo wp_get_attachment_image($item['image'], 'full', '', ['class' => 'object-fit-cover']);?>
            <?php endif;?>
            </a>
        </div>
      <?php endforeach;?>
    </div>
    <?php if(!empty($link['url'])):?>
      <a href="<?php echo esc_html($link['url']);?>-gallery" class="three-images__link"><?php echo esc_html($link['title']);?></a>
    <?php endif;?>
  </div>
</div>