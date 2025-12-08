<?php
/**
 * This file contains 404 error page elements
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

get_header();

?>

<main class="main">
	<div class="container">
		<div class="col-12 pt-5 pb-5">
			<div class="mt-5 mb-5 pt-5 pb-5 text-center">
				<h1 class="hentry"><?php _e('ERROR 404', 'fingleton'); ?></h1>
				<p><?php echo esc_html('Sorry, this page does not exist!', 'fingleton'); ?></p>
				<p>
					<a href="<?php echo esc_url(home_url('/')); ?>" class="button mt-3">
						<?php echo esc_html('Go to Homepage', 'fingleton'); ?>
					</a>
				</p>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
