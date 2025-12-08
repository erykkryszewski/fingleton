<?php
/**
 * Projects
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

get_header();

$projects_hero_title = get_field('projects_hero_title', 'options');
$projects_hero_text = get_field('projects_hero_text', 'options');

$counter = 0;

?>

<main class="main main--subpage">
  <div class="subpage-hero subpage-hero--projects">
    <div class="container">
      <div class="subpage-hero__wrapper">
        <div class="row subpage-hero__row">
          <div class="col-md-6">
            <div class="subpage-hero__content">
              <h1 class="subpage-hero__title"><?php echo apply_filters('the_title', $projects_hero_title);?></h1>
              <?php echo apply_filters('acf_the_content', $projects_hero_text);?>
            </div>
          </div>
          <div class="col-md-6">
            <!-- <div class="animated-words">
              <div class="animated-words__item animated-words__item--archive animated-words__item--archive-one animated-words__item--one">
                <img src="<?php echo get_template_directory_uri();?>/images/text-our.png" alt="text-our">
              </div>
              <div class="animated-words__item animated-words__item--archive animated-words__item--archive-two animated-words__item--two">
                <img src="<?php echo get_template_directory_uri();?>/images/text-projects.png" alt="text-projects">
              </div>
            </div> -->
            <div class="projects-filters">
              <div class="container">
                <div class="projects-filters__wrapper">
                  <?php echo do_shortcode('[searchandfilter id="1264"]');?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if (have_posts()) : ?>
    <div class="projects projects--subpage">
      <div class="container-fluid projects__container">
        <div class="projects__slider" id="projects-slider">
          <?php while (have_posts()): 
            $counter++;
          ?>
            <?php the_post(); ?>
            <?php if($counter % 8 == 1):?>
              <div class="projects__slide">
            <?php endif;?>
              <div class="projects__item" id="projects-item-<?php echo $counter;?>">
                <a href="<?php the_permalink();?>" class="cover projects__link"></a>
                <div class="projects__overlay"></div>
                <div class="projects__image">
                  <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', '', ["class" => "object-fit-cover"]); ?>
                </div>
                <div class="projects__content">
                  <div>
                    <h3 class="projects__title"><?php echo apply_filters('the_title', get_the_title());?></h3>
                    <p>
                      <?php
                        $terms = get_the_terms(get_the_ID(), 'place');
                        if ($terms && !is_wp_error($terms)) {
                          $links = array();
                          foreach ($terms as $term) {
                            $links[] = '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a>';
                          }
                          echo '<strong>Areas of work:</strong> ' . implode(', ', $links);
                        }
                      ?>
                    </p>
                  </div>
                  <div>
                    <a href="#" class="projects__square-link"><img src="<?php echo get_template_directory_uri();?>/images/projects-title-decorator.png" alt="projects-title-decorator"></a>
                  </div>
                </div>
              </div>
            <?php if($counter % 8 == 0):?>
              </div>
            <?php endif;?>
          <?php endwhile; ?>
          <?php if($counter % 8 != 0): ?>
            </div>
        <?php endif; ?>
        </div>
        <!-- <div class="projects__load-more">
          <button class="button projects__button"><?php esc_html_e('Load more', 'fingleton');?></button>
        </div> -->
        <?php wp_reset_postdata(); ?>
        <?php wp_reset_query(); ?>
      </div>
    </div>
  <?php else:?>
    <div class="container">
      <h1 class="mt-5">Nothing found</h1>
    </div>
  <?php endif; ?>
</main>
<?php get_footer(); ?>
