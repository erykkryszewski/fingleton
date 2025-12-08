<?php 

/**
 * ACF Block: Icons
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$icons = get_field('icons');

?>

<?php if(!empty($icons)):?>
  <div class="icons">
    <div class="container">
      <div class="icons__wrapper">
        <div class="row">
          <?php foreach($icons as $key => $item):?>
            <?php foreach($item['icons'] as $key => $subitem):?>
              <div class="col-12">
                <div class="icons__item">
                  <?php if(!empty($subitem['image'])):?>
                    <div class="icons__image">
                      <?php echo wp_get_attachment_image($subitem['image'], 'large');?>
                    </div>
                  <?php endif;?>
                  <?php if(!empty($subitem['content'])):?>
                    <div class="icons__content">
                      <?php echo apply_filters('the_title', $subitem['content']);?>
                    </div>
                  <?php endif;?>
                </div>
              </div>
            <?php endforeach;?>
          <?php endforeach;?>
        </div>
      </div>
    </div>
  </div>
<?php endif;?>

