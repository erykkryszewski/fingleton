<?php

// add privacy when account is registered

add_action('woocommerce_register_form', 'add_registration_privacy_policy', 11);
   
function add_registration_privacy_policy() {
 
woocommerce_form_field('privacy_policy_reg', array(
   'type'          => 'checkbox',
   'class'         => array('form-row privacy'),
   'label_class'   => array('my-account__checkbox-label'),
   'input_class'   => array('my-account__checkbox-input'),
   'required'      => true,
   'label'         => 'I accept&nbsp;<a href="/privacy-policy">Privacy Policy</a>',
));
 
woocommerce_form_field('terms_reg', array(
   'type'          => 'checkbox',
   'class'         => array('form-row privacy'),
   'label_class'   => array('my-account__checkbox-label'),
   'input_class'   => array('my-account__checkbox-input'),
   'required'      => true,
   'label'         => 'I accept&nbsp;<a href="/terms-and-conditions">Terms and Conditions</a>',
));
  
}
  
// Show error if user does not tick privacy on my account page
   
add_filter('woocommerce_registration_errors', 'validate_privacy_registration', 10, 3);
  
function validate_privacy_registration($errors, $username, $email) {
if (! is_checkout()) {
    if (! (int) isset($_POST['privacy_policy_reg']) || ! (int) isset($_POST['terms_reg'])) {
        $errors->add('privacy_policy_reg_error', __('Please accept Privacy Policy and Terms and Conditions.', 'woocommerce'));
    }
}
return $errors;
}
