import $ from 'jquery';

$(document).ready(function(){
  if($('.testimonials__slider')) {
    $('.testimonials__slider').slick({
      dots: true,
      arrows: false,
      infinite: true,
      speed: 550,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
      cssEase: 'ease-out',
      infinite: true,
      responsive: [
        {
          breakpoint: 1100,
          settings: {
            slidesToShow: 1
          }
        },
        {
          breakpoint: 700,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });
  
    $(".slick-prev").text("");
    $(".slick-next").text("");
    $("ul.slick-dots > li > button").text("");
  }
});