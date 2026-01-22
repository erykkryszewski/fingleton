<?php

/**
 * This file contains single post content
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

get_header();
global $post;


$projects_hero_background = get_field('projects_hero_background', 'options');

$sidebar_intro = get_field('sidebar_intro', $page_id);
$services_proviced = get_field('services_proviced', $page_id);
$project_gallery = get_field('project_gallery', $page_id);

$post = get_post();
$post_type = get_post_type();
$page_id = $post->ID;

$prev_post = get_previous_post();
$next_post = get_next_post();

if (!$prev_post) {
  $prev_post = get_posts([
    'posts_per_page' => 1,
    'order' => 'DESC',
    'post_type' => 'projects',
  ])[0];
}

if (!$next_post) {
  $next_post = get_posts([
    'posts_per_page' => 1,
    'order' => 'ASC',
    'post_type' => 'projects',
  ])[0];
}

// Query three newest similar posts based on post type
$args = array(
  'post_type'      => $post_type,
  'posts_per_page' => 3,
  'post__not_in'   => array($post->ID), // Exclude the current post
  'orderby'        => 'date',
  'order'          => 'DESC',
);

$similar_posts_query = new WP_Query($args);

$footer_logos = get_field('footer_logos', 'options');

?>

<main class="main main--subpage">
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
        <div class="subpage-hero subpage-hero--projects">
            <div class="container-fluid container-fluid--padding">
                <div class="subpage-hero__wrapper">
                    <div class="subpage-hero__content">
                        <h1 class="subpage-hero__title"><?php echo apply_filters('the_title', get_the_title()); ?></h1>
                        <p><?php
                              $terms = get_the_terms(get_the_ID(), 'place');
                              if ($terms && !is_wp_error($terms)) {
                                $links = array();
                                foreach ($terms as $term) {
                                  $links[] = '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a>';
                                }
                                echo '<strong>Areas of work:</strong> ' . implode(', ', $links);
                              }
                            ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-blog-post <?php if($post_type == 'projects') { echo 'cpt-project'; } ?>">
            <?php if ($prev_post) : ?>
                <a class="cpt-project__arrow cpt-project__arrow--prev" href="<?php echo get_permalink($prev_post->ID); ?>"></a>
            <?php endif; ?>
            <?php if ($next_post) : ?>
                <a class="cpt-project__arrow cpt-project__arrow--next" href="<?php echo get_permalink($next_post->ID); ?>"></a>
            <?php endif; ?>
            <div class="spacer" style="height: 55px"></div>
            <div class="container-fluid container-fluid--padding">
                <?php if($post_type == 'projects'): ?>
                    <div class="cpt-project__container">
                        <div class="row cpt-project__row">
                            <div class="col-xl-6 cpt-project__column">
                                <?php if(!empty(get_post_thumbnail_id($post->ID))): ?>
                                    <div class="cpt-project__image cpt-project__image--main"><?php echo wp_get_attachment_image(get_post_thumbnail_id($post->ID), 'large', '', ["class" => "object-fit-contain"]); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-xl-3">
                                <div class="cpt-project__content">
                                    <h3 class="m-0">Description</h3>
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <div class="col-xl-3 cpt-project__column">
                                <div class="cpt-project__sidebar">
                                    <div>
                                        <a class="cpt-project__back-button" href="/projects"><?php esc_html_e('Back to projects', 'fingleton'); ?></a>
                                        <?php if(!empty($services_proviced)): ?>
                                            <div><?php echo apply_filters('the_title', $services_proviced); ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if(!empty($project_gallery)): ?>
                                        <div class="cpt-project__gallery">
                                            <?php foreach($project_gallery as $key => $item): ?>
                                                <div class="cpt-project__image cpt-project__image--small"><?php echo wp_get_attachment_image($item['image'], 'large', '', ['class' => 'object-fit-cover']); ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!empty($footer_logos)): ?>
                                        <div class="bottom-bar__images">
                                            <?php foreach($footer_logos as $key => $item): ?>
                                                <div class="bottom-bar__logo"><?php echo wp_get_attachment_image($item['logo'], 'large', '', ['class' => '']); ?></div>
                                                <div class="bottom-bar__logo bottom-bar__logo--color"><?php echo wp_get_attachment_image($item['logo_color'], 'large', '', ['class' => '']); ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="single-blog-post__container">
                        <div class="row">
                            <div class="col-12">
                                <div class="single-blog-post__content">
                                    <div class="single-blog-post__image"><?php echo wp_get_attachment_image(get_post_thumbnail_id($post->ID), 'large', '', ["class" => "object-fit-cover"]); ?></div>
                                    <h1 class="single-blog-post__title"><?php the_title(); ?></h1>
                                    <div class="single-blog-post__text"><?php the_content(); ?></div>
                                    <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="button single-blog-post__button mt-5">Back to blog</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="spacer" style="height: 85px"></div>
                    <?php if ($similar_posts_query->have_posts()): ?>
                        <div class="projects projects--single">
                            <h2 class="mb-5"><?php esc_html_e('Other Projects', 'fingleton'); ?></h2>
                            <div class="projects__wrapper">
                                <div class="row">
                                    <?php while ($similar_posts_query->have_posts()): $similar_posts_query->the_post(); ?>
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="projects__item" id="projects-item-<?php echo $id; ?>">
                                            <a href="<?php the_permalink(); ?>" class="cover projects__link"></a>
                                            <div class="projects__image"><?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'large', '', ["class" => "object-fit-cover"]); ?></div>
                                            <div class="projects__content">
                                                <h3 class="projects__title"><?php echo apply_filters('the_title', get_the_title()); ?></h3>
                                                <?php echo apply_filters('acf_the_content', get_the_excerpt()); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
