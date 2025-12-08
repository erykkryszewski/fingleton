<?php

/**
 * ACF Block: Slider revolution
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$slider_name = get_field('slider_name');

if(!empty($slider_name)) { 
  add_revslider($slider_name); 
} 

?>

