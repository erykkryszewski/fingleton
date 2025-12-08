import $ from 'jquery';

$('.contact__link').on('click', function(e){
  e.preventDefault();
  $('html, body').delay(0).animate({
    scrollTop: $('#map').offset().top
  }, 500);
});

