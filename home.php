<?php

/**
 * Archive page template
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

get_header();

$blog_hero_background = get_field('blog_hero_background', 'options');
$blog_hero_title = get_field('blog_hero_title', 'options');
$blog_hero_text = get_field('blog_hero_text', 'options');

?>

<main class="main main--subpage">
    <div class="subpage-hero">
        <?php if(!empty($blog_hero_background)): ?>
            <div class="subpage-hero__background"><?php echo wp_get_attachment_image($blog_hero_background, 'full', '', ['class' => 'object-fit-cover']); ?></div>
        <?php endif; ?>
        <div class="container">
            <div class="row subpage-hero__row">
                <div class="col-md-6 col-lg-5">
                    <h1 class="subpage-hero__title"><?php echo apply_filters('the_title', $blog_hero_title); ?></h1>
                </div>
                <div class="col-md-6 col-lg-7"><?php echo apply_filters('the_title', $blog_hero_text); ?></div>
            </div>
        </div>
    </div>
    <?php if (have_posts()) : ?>
        <div class="third-blog">
            <div class="container">
                <div class="third-blog__wrapper">
                    <div class="row">
                        <?php while (have_posts()) : ?>
                            <?php the_post(); ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="third-blog__item">
                                    <div class="third-blog__image">
                                        <a href="<?php the_permalink(); ?>" class="third-blog__link"></a>
                                        <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', '', ["class" => "object-fit-cover"]); ?>
                                    </div>
                                    <div class="third-blog__content">
                                        <div>
                                            <a href="<?php the_permalink(); ?>" class="third-blog__title"><?php the_title(); ?></a>
                                            <span class="third-blog__time"><time><?php the_time('F j, Y'); ?></time></span>
                                            <p><?php echo substr(get_the_excerpt(), 0, 150); ?>...</p>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="button button--light third-blog__button"><?php _e('Read more', 'fingleton'); ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="pagination mt-5"><?php
                echo paginate_links(array(
                  'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                  'current'      => max(1, get_query_var('paged')),
                  'format'       => '?paged=%#%',
                  'show_all'     => false,
                  'type'         => 'list',
                  'end_size'     => 2,
                  'mid_size'     => 1,
                  'prev_next'    => true,
                  'prev_text'    => '',
                  'next_text'    => '',
                  'add_args'     => false,
                  'add_fragment' => '',
              ));
              ?></div>
                <?php wp_reset_postdata(); ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
