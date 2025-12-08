<?php 

/**
 * ACF Block: Blank Text
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$blank_text = get_field('blank_text');

?>

<div class="blank-text">
  <div class="container">
    <?php foreach($blank_text as $key => $item):?>
      <div class="blank-text__item">
        <?php if(!empty($item['title'])):?>
          <h3 class="blank-text__title"><?php echo apply_filters('the_title', $item['title']);?></h3>
        <?php endif;?>
        <?php echo apply_filters('acf_the_content', $item['text']);?>
      </div>
    <?php endforeach;?>
  </div>
</div>