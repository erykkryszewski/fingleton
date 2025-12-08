import $ from 'jquery';

$(document).ready(function(){
  if($('.timeline__slider').length) {  // Changed to check for the length of the jQuery object
    $('.timeline__slider').slick({
      dots: false,
      arrows: false,
      infinite: true,
      speed: 550,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 5000,
      cssEase: 'ease-out',
      infinite: true,
      responsive: [
        {
          breakpoint: 1600,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });
  
    $(".slick-prev").text("");
    $(".slick-next").text("");
    $("ul.slick-dots > li > button").text("");

    $('.timeline__slider .slick-slide').on('click', function() {
      let currentSlide = $('.timeline__slider').slick('slickCurrentSlide');
      let clickedSlideIndex = $(this).data('slick-index');

      if (clickedSlideIndex > currentSlide) {
        $('.timeline__slider').slick('slickNext');
      }
    });
  }
});
