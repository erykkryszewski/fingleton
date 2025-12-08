<?php 

/**
 * ACF Block: Wyswig content
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$content = get_field('content');

?>

<?php if(!empty($content)):?>
  <div class="wyswig-content">
    <div class="container">
      <div class="wyswig-content__text">
        <?php echo apply_filters('the_title', $content);?>
      </div>
    </div>
  </div>
<?php endif;?>