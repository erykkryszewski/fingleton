<?php 

/**
 * ACF Block: Checkbox info
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$title = get_field('title');
$checkboxes = get_field('checkboxes');

?>

<?php if(!empty($checkboxes)):?>
  <div class="checkbox-info">
    <div class="container">
      <div class="row checkbox-info__row">
        <div class="col-xl-4">
          <h3 class="checkbox-info__title"><?php echo apply_filters('the_title', $title);?></h3>
        </div>
        <div class="col-xl-8">
          <div class="checkbox-info__wrapper">
            <?php foreach($checkboxes as $key => $item):?>
              <div class="checkbox-info__item">
                <div class="checkbox-info__image">
                  <?php echo wp_get_attachment_image($item['image'], 'full', '', ['class' => '']);?>
                </div>
                <?php echo apply_filters('acf_the_content', $item['text']);?>
              </div>
            <?php endforeach;?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif;?>