<?php 

/**
 * ACF Block: Vouchers form
 *
 *
 * @package fingleton
 * @license GPL-3.0-or-later
 */

$form_id = get_field('form_id');

?>

<div class="vouchers-form">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
        <div class="vouchers-form__form form">
          <?php echo gravity_form($form_id, false, false, false, '', false, 12);?>
        </div>
      </div>
    </div>
  </div>
</div>