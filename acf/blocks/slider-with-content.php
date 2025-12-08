<?php 

/**
 * ACF Block: Slider with content
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$icon = get_field('icon');
$title = get_field('title');
$content = get_field('content');
$slider = get_field('slider');

?>

<?php if(!empty($slider)):?>
  <div class="slider-with-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="slider-with-content__details">
            <?php if(!empty($icon)):?>
              <div class="slider-with-content__icon">
                <?php echo wp_get_attachment_image($icon, 'large');?>
              </div>
            <?php endif;?>
            <?php if(!empty($title)):?>
              <h2 class="slider-with-content__title"><?php echo apply_filters('the_title', $title);?></h2>
            <?php endif;?>
            <?php if(!empty($content)):?>
              <div class="slider-with-content__text">
                <?php echo apply_filters('the_title', $content);?>
              </div>
            <?php endif;?>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="slider-with-content__gallery">
            <?php foreach($slider as $key => $item):?>
              <div class="slider-with-content__image">
                <?php echo wp_get_attachment_image($item['image'], 'large', '', ['class' => 'object-fit-cover']);?>
              </div>
            <?php endforeach;?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif;?>