<?php

$search_and_filter_shortcode_id = get_field("search_and_filter_shortcode_id", "options"); ?>

<?php if (!empty($search_and_filter_shortcode_id)): ?>
  <div class="product-filters">
    <?php echo do_shortcode('[searchandfilter id="' . $search_and_filter_shortcode_id . '"]'); ?>
  </div>
<?php endif; ?>
