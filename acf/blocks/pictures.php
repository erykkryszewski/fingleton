<?php 

$section_id = get_field('section_id');
$gallery = get_field('gallery');

$sentence_one = get_field('sentence_one');
$sentence_two = get_field('sentence_two');

?>

<?php if(!empty($gallery)): ?>
  <section class="pictures">
    <?php if(!empty($section_id)): ?>
      <div id="<?php echo esc_attr($section_id); ?>" class="section-anchor"></div>
    <?php endif; ?>

    <div class="container-fluid">
      <div class="pictures__grid">
        <?php foreach($gallery as $key => $image_id): ?>
          <div class="pictures__item">
            <?php echo wp_get_attachment_image($image_id, 'full', false, ['class' => 'object-fit-cover']); ?>
          </div>
        <?php endforeach; ?>
      </div>
          <div class="row">
        <div class="col-12 col-lg-7 offset-lg-5">
                <?php if(!empty($sentence_one) && !empty($sentence_two)):?>
                    <div class="animated-words animated-words--pictures">
                        <div class="animated-words__item animated-words__item--one">
                        <?php echo wp_get_attachment_image($sentence_one, 'full');?>
                        </div>
                        <div class="animated-words__item animated-words__item--two">
                        <?php echo wp_get_attachment_image($sentence_two, 'full');?>
                        </div>
                    </div>
                <?php endif;?>
        </div>
    </div>
    </div>
  </section>
<?php endif; ?>