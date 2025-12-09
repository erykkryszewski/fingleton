<?php 

$section_id = get_field('section_id');
$gallery = get_field('gallery');

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
    </div>
  </section>
<?php endif; ?>