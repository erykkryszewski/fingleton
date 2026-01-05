<?php

$info = get_field("info", get_the_ID());
$info_background = get_field("info_background", get_the_ID());
?>

<div class="spacer spacer--small" style="height:40px"></div>

<?php if (!empty($info)): ?>
  <div class="product-info">
    <div class="product-info__background">
      <?php echo wp_get_attachment_image($info_background, "large", "", [
          "class" => "object-fit-cover",
      ]); ?>
    </div>
    <div class="product-info__wrapper">
      <div class="row product-info__row">
        <div class="col-lg-6">
          <?php foreach ($info as $key => $item): ?>
            <div class="product-info__item <?php if ($key == 0) {
                echo "product-info__item--active";
            } ?>">
              <h3 class="product-info__title <?php if ($key == 0) {
                  echo "product-info__title--active";
              } ?>"><?php echo apply_filters("the_title", $item["title"]); ?></h3>
              <div class="product-info__text product-info__text--<?php echo $key +
                  1; ?>"><?php echo apply_filters("acf_the_content", $item["text"]); ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
