<?php

/**
 * ACF Block: Facebook posts
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$title = get_field('title');


$csv = get_stylesheet_directory_uri() . '/fb.csv';
$keys = [];
$new_array = [];
$api = csvToArray($csv, ',');
$count = count( $api ) - 1;
$labels = array_shift( $api );
foreach ( $labels as $label ) {
  $keys[] = $label;
}

$keys[] = 'id';

for ( $i = 0; $i < $count; $i++ ) {
  $api[$i][] = $i;
}

for ( $j = 0; $j < $count; $j++ ) {
  $d = array_combine( $keys,  $api[$j] );
  $content[$j] = $d;
}

?>

<?php if(!empty($content)): ?>
    <div class="container">
        <?php if(!empty($title)): ?>
            <h2 class="section-title"><?php echo apply_filters('the_title', $title); ?></h2>
        <?php endif; ?>
        <div class="row">
            <?php foreach($content as $key => $list): ?>
                <?php
                  $fanpage_name = $content[$key][username];
                  $fanpage_thumbnail = 'https://scontent-waw1-1.xx.fbcdn.net/v/t1.18169-9/62683_501375649911090_1911142592_n.png?_nc_cat=102&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=V35CYGYFO8QAX9PQPkZ&_nc_ht=scontent-waw1-1.xx&oh=0da364dcd3dbddf6ee01072b2c1a92fa&oe=60EAF492';

                  $post_image = $content[$key][image];
                  $post_message = $content[$key][text];
                  $post_created_time = $content[$key][time];
                  $post_permalink_url = $content[$key][post_url];
                ?>
                <?php if(!empty($post_image) && $key < 3): ?>
                    <div class="col-12 col-lg-4">
                        <div class="facebook-post">
                            <a href="<?php echo esc_url_raw($post_permalink_url); ?>" class="facebook-post__link" target="_blank"></a>
                            <div class="facebook-post__image">
                                <img src="<?php echo esc_url_raw($post_image); ?>" alt="post-image" class="object-fit-cover" />
                            </div>
                            <div class="facebook-post__content">
                                <div class="facebook-post__profile-info">
                                    <div>
                                        <div class="facebook-post__profile-thumbnail">
                                            <img src="<?php echo esc_url_raw($fanpage_thumbnail); ?>" alt="post-image" class="object-fit-cover" />
                                        </div>
                                        <div>
                                            <p><?php echo esc_html($fanpage_name); ?></p>
                                            <span><?php echo esc_html(substr($post_created_time, 0, strpos($post_created_time, "T"))); ?></span>
                                        </div>
                                    </div>
                                    <div class="facebook-post__icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/facebook-icon2.png" alt="facebook-icon" />
                                    </div>
                                </div>
                                <div class="facebook-post__excerpt">
                                    <p><?php echo esc_html(substr($post_message, 0, 200)); ?>...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
