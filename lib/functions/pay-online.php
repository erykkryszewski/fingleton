<?php 

// Add Euro Sing in front of currency + fix decimal and thousands separator
add_filter( 'gform_currencies', function( $currencies ) {
  $currencies['EUR']['symbol_left']        = '&#8364;';
  $currencies['EUR']['symbol_right']       = '';
  $currencies['EUR']['decimals']           = 2;
  $currencies['EUR']['thousand_separator'] = ' ';
  $currencies['EUR']['decimal_separator']  = '.';
  return $currencies;
} );

// Remove Gravity Forms Thousands Separator
add_filter( 'gform_include_thousands_sep_pre_format_number', '__return_false' );

// Fix amount input
add_action( 'wp_footer', function () {
  ?>
<script type="text/javascript">
jQuery('.ginput_amount').on('change keyup blur focusout', function(event) {
  event.preventDefault();
  event.stopPropagation();
  let value = jQuery(this).val();
  jQuery(this).val(value.replace(',', '.'));
});
</script>
<?php

} );