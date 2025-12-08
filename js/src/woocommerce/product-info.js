import $ from 'jquery';

$('document').ready(function(){
  if($('.product-info__title').length > 0) {
    $('.product-info__title').on('click', function() {
      
      if($(this).hasClass('product-info__title--active')) {
        $('.product-info__title--active').next().slideUp();
        $('.product-info__title').removeClass('product-info__title--active');
      } else {
        $('.product-info__title--active').next().slideUp();
        $('.product-info__title').removeClass('product-info__title--active');
  
        $(this).next().slideToggle();
        $(this).toggleClass('product-info__title--active');
      }
    });
  }
});