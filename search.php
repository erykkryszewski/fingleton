<?php 

get_header();
global $post;

$post = get_post();
$page_id = $post->ID;

$s = get_search_query();
$args = array(
  's' => $s
);

?>

<main class="main main--subpage">
  <!-- max 12 items -->
  <?php if(have_posts()):?>
    <section class="archive">
      <div class="container">
        <div class="archive__wrapper">
          <div class="row" id="search-wrapper">
            <?php while (have_posts()): the_post(); ?>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="archive__item">
                  <div class="archive__image">
                    <a href="<?php the_permalink();?>" class="archive__link"></a>
                    <?php echo wp_get_attachment_image(get_post_thumbnail_id($post->ID), 'full', '', ["class" => "object-fit-cover"]); ?>
                  </div>
                  <div class="archive__content">
                    <a href="<?php the_permalink();?>" class="archive__title"><?php the_title(); ?></a>
                    <p><?php echo substr(get_the_excerpt(), 0, 166); ?>...</p>
                    <a href="<?php the_permalink();?>" class="archive__read-more"><?php _e('Read more', 'fingleton');?></a>
                  </div>
                </div>
              </div>
            <?php endwhile;?>
          </div>
        </div>
        <div class="pagination">
          <?php echo pagination(); ?>
        </div>
        <?php wp_reset_query(); ?>
      </div>
    </section>
  <?php endif;?>

  <!-- if there is no results  -->

  <?php if(!have_posts()):?>
    <div class="single-blog-post">
      <div class="container">
        <div class="row" id="search-wrapper">
          <div class="col-12">
            <div class="single-blog-post__content">
              <h2><?php _e('No posts found', 'fingleton');?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif;?>
</main>
<?php get_footer(); ?>