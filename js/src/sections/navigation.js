import $ from 'jquery';
import { gsap } from "gsap";
import { ScrollTrigger } from 'gsap/ScrollTrigger';

$('document').ready(function() {
  let isAnimating = false;

  $('.hamburger').on('click', function() {
    if (isAnimating) return;

    isAnimating = true;

    setTimeout(() => {
      $(this).toggleClass('active');
    }, 10);

    $('.header').toggleClass('header--open');
    $('.nav').toggleClass('nav--open');
    $('.nav__container').toggleClass('nav__container--open');
    $('.nav__logo').toggleClass('nav__logo--open');

    let isMobile = window.innerWidth <= 991;
    let scaleXStart = isMobile ? 1 : 0;
    let scaleYStart = isMobile ? 0 : 1;

    if ($('.nav__wrapper').is(':visible')) {
      // Fade out the entire wrapper without animating
      $('.nav__wrapper').fadeToggle(function() {
        // Set the opacity of only nav__menu list items to 0
        gsap.set('.nav__menu li', { opacity: 0 });
        isAnimating = false;  // Reset here after fadeToggle is complete
      });
    } else {
      $('.nav__wrapper').fadeToggle(0, function() {
        gsap.fromTo('.nav__menu', {
          duration: 0.8,
          scaleX: scaleXStart,
          scaleY: scaleYStart,
          opacity: 0
        }, {
          scaleX: 1,
          scaleY: 1,
          opacity: 1,
          onComplete: function() {
            gsap.to('.nav__submenu', {
              duration: 0.9,
              opacity: 1,
              onComplete: function() {
                isAnimating = false;  // Reset here after animations are complete
              }
            });

            // Staggered animation for .nav__menu li
            gsap.fromTo('.nav__menu li', 
            { opacity: 0, y: -20 }, 
            {
              opacity: 1,
              y: 0,
              stagger: 0.2,
              duration: 0.4
            });
          }
        });
      });
    }
  });
});
