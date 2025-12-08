<?php 

/**
 * ACF Block: Gallery
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$images = get_field('images');
$section_id = get_field('section_id');
$sentence_one = get_field('sentence_one');
$sentence_two = get_field('sentence_two');

?>

<?php if(!empty($images)):?>
  <div class="gallery <?php if($background == 'true') { echo 'gallery--background'; }?>">
    <?php if(!empty($section_id)):?>
      <div class="section-id" id="<?php echo esc_html($section_id);?>"></div>
    <?php endif;?>
    <div class="<?php if($full_width == 'true') { echo 'container-fluid container-fluid--padding'; } else { echo 'container'; }?>">
      <div class="gallery__slider">
        <?php foreach($images as $key => $item):?>
          <div class="gallery__item">
            <?php
              $full_image_src = wp_get_attachment_image_src($item['image'], 'full');
            ?>
            <a class="gallery__image <?php if($full_width == 'true') { echo 'gallery__image--full-width'; }?>" data-fancybox="gallery" href="<?php echo esc_url($full_image_src[0]);?>">
              <?php echo wp_get_attachment_image($item['image'], 'full', false, array('class' => 'object-fit-cover', 'alt' => 'tacy-sami-galeria-'.($key+1), 'title' => 'tacy-sami-galeria-'.($key+1))); ?>
            </a>
          </div>
        <?php endforeach;?>
      </div>
    </div>
    <?php if(!empty($sentence_one) && !empty($sentence_two)):?>
      <div class="animated-words">
        <div class="animated-words__item animated-words__item--one">
          <?php echo wp_get_attachment_image($sentence_one, 'full');?>
        </div>
        <div class="animated-words__item animated-words__item--two">
          <?php echo wp_get_attachment_image($sentence_two, 'full');?>
        </div>
      </div>
    <?php endif;?>
  </div>
<?php endif;?>