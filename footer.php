<?php

/**
 * This file contains theme footer bottom
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$global_phone_number = get_field('global_phone_number', 'options');
$global_phone_number_display = get_field('global_phone_number_display', 'options');
$global_email = get_field('global_email', 'options');
$global_logo = get_field('global_logo', 'options');
$global_terms_and_conditions = get_field('global_terms_and_conditions','options');
$global_privacy_policy = get_field('global_privacy_policy','options');
$global_social_media = get_field('global_social_media', 'options');
$global_address = get_field('global_address', 'options');

$bottom_bar_social_media = get_field('bottom_bar_social_media', 'options');

$newsletter_shortcode = get_field('newsletter_shortcode', 'options');

$cookies_text = get_field('cookies_text', 'options');

$google_analytics_code = get_field('google_analytics_code', 'options');
$facebook_pixel_code = get_field('facebook_pixel_code', 'options');

$footer_logo = get_field('footer_logo', 'options');
$footer_text = get_field('footer_text', 'options');
$footer_locations = get_field('footer_locations', 'options');
$footer_logos = get_field('footer_logos', 'options');

$page_url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

?>

<div class="cookies">
    <?php if(!empty($cookies_text)): ?>
        <?php echo apply_filters('acf_the_content', $cookies_text); ?>
    <?php else: ?>
        <p><?php _e('We use cookies to ensure that we give you the best experience on our website. If you continue to use this site we will assume that you agree with it and you accept our', 'fingleton'); ?>&nbsp;<a href="/privacy-policy"><?php _e('privacy policy', 'fingleton'); ?></a>.</p>
    <?php endif; ?>
    <button class="button cookies__button"><?php _e('I agree', 'fingleton'); ?></button>
</div>

<?php if(!is_front_page()): ?>
    <footer class="footer">
        <div class="container">
            <div class="footer__wrapper">
                <div class="row footer__row">
                    <div class="col-12 col-lg-2">
                        <div class="footer__column">
                            <a href="/" class="footer__logo">
                                <?php echo wp_get_attachment_image($footer_logo, 'large', '', ["class" => ""]); ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-10">
                        <div class="footer__content">
                            <div class="footer__text">
                                <?php echo apply_filters('acf_the_content', $footer_text); ?>
                            </div>
                            <?php if(!empty($footer_locations)): ?>
                                <ul class="footer__locations">
                                    <?php foreach($footer_locations as $key => $item): ?>
                                        <li>
                                            <a href="<?php echo esc_html($item['link']); ?>"><?php echo esc_html($item['text']); ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <?php if(!empty($global_social_media)): ?>
                                <ul class="social-media footer__social-media">
                                    <?php foreach($global_social_media as $key => $item): ?>
                                        <li>
                                            <a href="<?php echo esc_url_raw($item['link']); ?>" target="_blank">
                                                <?php echo wp_get_attachment_image($item['icon'], 'full', '', ['class' => '']); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-bar">
            <div class="container">
                <div class="bottom-bar__wrapper">
                    <div class="bottom-bar__content">
                        <p><?php _e('Copyright', 'fingleton'); ?> © <?php echo date("Y"); ?> Fingleton White, CRO - 86002</p>
                        <a href="<?php echo $global_terms_and_conditions; ?>"><?php _e('Terms and Conditions', 'fingleton'); ?></a>
                        <a href="<?php echo $global_privacy_policy; ?>"><?php _e('Privacy Policy', 'fingleton'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>

<?php if($google_analytics_code): ?>
    <?php echo wp_kses($google_analytics_code, ['script' => ['async' => [], 'src' => []]]); ?>
<?php endif; ?>

<?php if($facebook_pixel_code): ?>
    <?php echo wp_kses($facebook_pixel_code, ['script' => ['async' => [], 'src' => []]]); ?>
<?php endif; ?>

</body>
</html>
<?php wp_footer(); ?>
