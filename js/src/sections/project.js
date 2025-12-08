import $ from 'jquery';

function adjustImageHeight() {
  if ($(window).width() >= 1200) {
    const sidebarHeight = $('.cpt-project__sidebar').height();
    // $('.cpt-project__image--main').height(sidebarHeight);
  } else {
    $('.cpt-project__image--main').css('height', 'auto');
  }
}

function initGallery() {
  $('.cpt-project__image--small').on('click', function() {
    const newSrc = $(this).find('img').attr('src');
    const newSrcset = $(this).find('img').attr('srcset');
    $('.cpt-project__image--main img').attr('src', newSrc).attr('srcset', newSrcset);
  });
}

$(document).ready(function() {
  if ($('.cpt-project__sidebar').length) {
    adjustImageHeight();
    initGallery();
    $(window).on('resize', adjustImageHeight);
  }
});
