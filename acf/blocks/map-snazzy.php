<?php 

/**
 * ACF Block: Map Snazzy
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$map_marker = get_field('map_marker');
$marker_url = wp_get_attachment_image_src($map_marker);

$map_marker_second = get_field('map_marker_second');
$marker_url_second = wp_get_attachment_image_src($map_marker_second);

?>

<div class="map-snazzy" data-zoom="7" data-marker-url="<?php echo esc_url_raw($marker_url[0]);?>" id="map"> 
  <div class="map-snazzy__marker" data-lat="53.033890" data-lng="-7.294310"></div> 
  <div class="map-snazzy__marker" data-lat="53.330900" data-lng="-6.375710"></div> 
  <div class="map-snazzy__marker" data-lat="51.905720" data-lng="-8.363790"></div> 
  <div class="map-snazzy__marker" data-lat="53.334760" data-lng="-9.379020"></div> 
  <div class="map-snazzy__marker" data-lat="51.752600" data-lng="-0.475550"></div> 
  <div class="map-snazzy__marker" data-lat="54.712370" data-lng="-6.177390"></div> 
  <div class="map-snazzy__marker" data-lat="52.656290" data-lng="-7.243560" data-marker-url="<?php echo esc_url_raw($marker_url_second[0]); ?>" data-marker-width="30" data-marker-height="44"></div>
</div>
 