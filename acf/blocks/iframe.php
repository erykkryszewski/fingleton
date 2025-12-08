<?php 

/**
 * ACF Block: Iframe
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$iframe_src = get_field('iframe_src');
$iframe_height = get_field('iframe_height');

?>

<div class="iframe">
  <div class="container">
    <div class="iframe__element">
      <iframe src="<?php echo esc_url_raw($iframe_src);?>" frameborder="0" height="<?php if(!empty($iframe_height)) { echo esc_html($iframe_height); } else { echo '500'; }?>"></iframe>
    </div>
  </div>
</div>