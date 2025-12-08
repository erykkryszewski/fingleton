<?php
/**
 * This file contains page elements
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

get_header();
the_post();

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

?>

<main class="main main--subpage <?php if(strpos($url,'privacy-policy') !== false) { echo 'main--privacy-policy'; }?> <?php if(strpos($url,'terms-and-conditions') !== false) { echo 'main--terms-and-conditions'; }?>">
  <?php the_content(); ?>
</main>
<?php get_footer(); ?>
