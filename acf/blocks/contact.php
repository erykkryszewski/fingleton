<?php 

/**
 * ACF Block: Contact
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$title = get_field('title');
$text = get_field('text');
$location_info = get_field('location_info');

$sentence_one = get_field('sentence_one');
$sentence_two = get_field('sentence_two');

$locationsGroupedByCountry = array();

if (!empty($location_info) && is_array($location_info)) {
    foreach ($location_info as $locationIndex => $locationItem) {
        if (empty($locationItem['title'])) {
            continue;
        }

        $rawTitleString = trim(wp_strip_all_tags($locationItem['title']));
        $regionNameString = $rawTitleString;
        $countryNameString = '';

        if (strpos($rawTitleString, ',') !== false) {
            $titlePartsArray = explode(',', $rawTitleString);
            $firstTitlePartString = trim($titlePartsArray[0]);
            $lastTitlePartString = trim($titlePartsArray[count($titlePartsArray) - 1]);

            if ($firstTitlePartString !== '') {
                $regionNameString = $firstTitlePartString;
            }

            if ($lastTitlePartString !== '') {
                $countryNameString = $lastTitlePartString;
            }
        }

        if ($countryNameString === '') {
            $countryNameString = 'Ireland';
        }

        if (stripos($rawTitleString, 'UK') !== false || stripos($rawTitleString, 'United Kingdom') !== false) {
            $countryNameString = 'UK';
        }

        $countryKeyString = sanitize_title($countryNameString);

        if (!isset($locationsGroupedByCountry[$countryKeyString])) {
            $locationsGroupedByCountry[$countryKeyString] = array(
                'label' => $countryNameString,
                'locations' => array()
            );
        }

        $locationIdString = '';

        if (!empty($locationItem['id'])) {
            $locationIdString = sanitize_title($locationItem['id']);
        }

        if ($locationIdString === '') {
            $locationIdString = sanitize_title($regionNameString . '-' . $countryNameString . '-' . $locationIndex);
        }

        $locationsGroupedByCountry[$countryKeyString]['locations'][$locationIdString] = array(
            'id' => $locationIdString,
            'region' => $regionNameString,
            'country' => $countryNameString,
            'item' => $locationItem
        );
    }
}

?>

<div class="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <div class="contact__intro">
          <div>
            <?php if (!empty($title)) : ?>
              <h1 class="contact__title"><?php echo apply_filters('the_title', $title); ?></h1>
            <?php endif; ?>
            <?php if (!empty($text)) : ?>
              <?php echo apply_filters('acf_the_content', $text); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="contact__button-wrapper">
            <a href="/careers" class="button content-with-buttons__button">Careers</a>
        </div>
      </div>
    </div>

    <?php if (!empty($locationsGroupedByCountry)) : ?>
      <div class="contact__wrapper">
        <div class="contact__layout">
          <div class="contact__details">

                  <div class="contact__tabs">
          <div class="contact__countries">
            <?php
            $isFirstCountry = true;
            foreach ($locationsGroupedByCountry as $countryKeyString => $countryDataArray) :
                $countryLabelString = $countryDataArray['label'];
                $countryButtonClassesString = 'contact__country-button';
                if ($isFirstCountry) {
                    $countryButtonClassesString .= ' is-active';
                }
            ?>
              <button
                type="button"
                class="<?php echo esc_attr($countryButtonClassesString); ?>"
                data-country="<?php echo esc_attr($countryKeyString); ?>"
              >
                <?php echo esc_html($countryLabelString); ?>
              </button>
            <?php
                $isFirstCountry = false;
            endforeach;
            ?>
          </div>

          <div class="contact__location-tabs">
            <?php
            $isFirstCountry = true;
            foreach ($locationsGroupedByCountry as $countryKeyString => $countryDataArray) :
                $locationsForCountryArray = $countryDataArray['locations'];
                if (empty($locationsForCountryArray)) {
                    continue;
                }
                $locationsGroupClassesString = 'contact__location-tabs-group';
                if ($isFirstCountry) {
                    $locationsGroupClassesString .= ' is-active';
                }
            ?>
              <div
                class="<?php echo esc_attr($locationsGroupClassesString); ?>"
                data-country="<?php echo esc_attr($countryKeyString); ?>"
              >
                <?php
                $isFirstLocationInCountry = true;
                foreach ($locationsForCountryArray as $locationIdString => $locationDataArray) :
                    $regionNameString = $locationDataArray['region'];
                    $locationButtonClassesString = 'contact__location-button';
                    if ($isFirstCountry && $isFirstLocationInCountry) {
                        $locationButtonClassesString .= ' is-active';
                    }
                ?>
                  <button
                    type="button"
                    class="<?php echo esc_attr($locationButtonClassesString); ?>"
                    data-location-id="<?php echo esc_attr($locationIdString); ?>"
                  >
                    <?php echo esc_html($regionNameString); ?>
                  </button>
                <?php
                    $isFirstLocationInCountry = false;
                endforeach;
                ?>
              </div>
            <?php
                $isFirstCountry = false;
            endforeach;
            ?>
          </div>
        </div>

            <?php
            $isFirstCountry = true;
            foreach ($locationsGroupedByCountry as $countryKeyString => $countryDataArray) :
                $locationsForCountryArray = $countryDataArray['locations'];
                if (empty($locationsForCountryArray)) {
                    continue;
                }
                $isFirstLocationInCountry = true;
                foreach ($locationsForCountryArray as $locationIdString => $locationDataArray) :
                    $locationItem = $locationDataArray['item'];
                    $regionNameString = $locationDataArray['region'];

                    $panelClassesString = 'contact-location-panel';
                    if ($isFirstCountry && $isFirstLocationInCountry) {
                        $panelClassesString .= ' is-active';
                    }

                    $addressHtmlString = '';
                    $addressForMapString = '';

                    if (!empty($locationItem['address'])) {
                        $addressHtmlString = $locationItem['address'];
                        $addressForMapString = wp_strip_all_tags($locationItem['address']);
                    }

                    $latitudeAttributeString = '';
                    $longitudeAttributeString = '';

                    if (!empty($locationItem['lat'])) {
                        $latitudeAttributeString = $locationItem['lat'];
                    }

                    if (!empty($locationItem['lng'])) {
                        $longitudeAttributeString = $locationItem['lng'];
                    }

                    $dataAttributesString = ' data-country="' . esc_attr($countryKeyString) . '" data-location-id="' . esc_attr($locationIdString) . '"';

                    if ($addressForMapString !== '') {
                        $dataAttributesString .= ' data-address="' . esc_attr($addressForMapString) . '"';
                    }

                    if ($latitudeAttributeString !== '') {
                        $dataAttributesString .= ' data-lat="' . esc_attr($latitudeAttributeString) . '"';
                    }

                    if ($longitudeAttributeString !== '') {
                        $dataAttributesString .= ' data-lng="' . esc_attr($longitudeAttributeString) . '"';
                    }
            ?>
              <div class="<?php echo esc_attr($panelClassesString); ?>"<?php echo $dataAttributesString; ?>>
                <div class="location-info location-info--contact">
                  <?php if (!empty($locationItem['id'])) : ?>
                    <div class="location-info__id" id="<?php echo esc_attr($locationItem['id']); ?>"></div>
                  <?php endif; ?>

                  <?php if (!empty($regionNameString)) : ?>
                    <h2 class="location-info__title"><?php echo esc_html($regionNameString); ?></h2>
                  <?php endif; ?>

                  <div class="location-info__content">
                    <?php if ($addressHtmlString !== '') : ?>
                      <span class="location-info__address">
                        <?php echo wp_kses_post($addressHtmlString); ?>
                      </span>
                    <?php endif; ?>

                    <?php if (!empty($locationItem['phone'])) : ?>
                      <a
                        class="location-info__phone"
                        href="<?php echo esc_url($locationItem['phone']['url']); ?>"
                      >
                        <?php esc_html_e('Phone: ', 'fingleton'); ?>
                        <span><?php echo esc_html($locationItem['phone']['title']); ?></span>
                      </a>
                    <?php endif; ?>

                    <?php if (!empty($locationItem['email'])) : ?>
                      <a
                        class="location-info__email"
                        href="<?php echo esc_url($locationItem['email']['url']); ?>"
                      >
                        <?php esc_html_e('Email: ', 'fingleton'); ?>
                        <span><?php echo esc_html($locationItem['email']['title']); ?></span>
                      </a>
                    <?php endif; ?>

                    <?php if (!empty($locationItem['website'])) : ?>
                      <a
                        class="location-info__website"
                        href="<?php echo esc_url($locationItem['website']['url']); ?>"
                        target="_blank"
                        rel="noopener"
                      >
                        <?php echo esc_html($locationItem['website']['title']); ?>
                      </a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php
                    $isFirstLocationInCountry = false;
                endforeach;
                $isFirstCountry = false;
            endforeach;
            ?>
          </div>

          <div class="contact__map-col">
            <div id="map" class="contact__map"></div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

    <?php if(!empty($sentence_one) && !empty($sentence_two)):?>
      <div class="animated-words animated-words--contact">
        <div class="animated-words__item animated-words__item--one">
          <?php echo wp_get_attachment_image($sentence_one, 'full');?>
        </div>
        <div class="animated-words__item animated-words__item--two">
          <?php echo wp_get_attachment_image($sentence_two, 'full');?>
        </div>
      </div>
    <?php endif;?>
</div>
