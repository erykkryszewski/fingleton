<?php

/**
 * This file contains front page elements
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

get_header();
the_post();

?>

<main class="main <?php if(!is_front_page()) { echo 'main--subpage'; } ?>"><?php the_content(); ?></main>
<?php get_footer(); ?>
