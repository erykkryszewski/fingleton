import $ from "jquery";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

$(document).ready(function () {
    if ($(".gallery__slider")) {
        $(".gallery__slider").slick({
            dots: true,
            arrows: false,
            infinite: true,
            speed: 550,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            cssEase: "ease-out",
            infinite: true,
            responsive: [
                {
                    breakpoint: 1100,
                    settings: {
                        slidesToShow: 1,
                    },
                },
                {
                    breakpoint: 700,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });

        $(".slick-prev").text("");
        $(".slick-next").text("");
        $("ul.slick-dots > li > button").text("");
    }

    // gallery animated words

    gsap.registerPlugin(ScrollTrigger);

    let startPosition = window.innerWidth <= 991 ? "30%" : "20%";
    let startPositionArchive = window.innerWidth <= 991 ? "35" : "25%";

    // Listen for resize events and update startPosition if necessary
    window.addEventListener("resize", () => {
        startPosition = window.innerWidth <= 991 ? "30%" : "20%";
        startPositionArchive = window.innerWidth <= 991 ? "35" : "25%";
    });

    $(".animated-words").each(function () {
        const $this = $(this);

        // Check if this section is the one at the top (archive version)
        if ($this.find(".animated-words__item--archive").length > 0) {
            // Create animation for the first sentence inside this container
            gsap.fromTo(
                $this.find(".animated-words__item--one.animated-words__item--archive"),
                { x: `-${startPositionArchive}` },
                {
                    x: "0%",
                    immediateRender: false,
                    scrollTrigger: {
                        trigger: $this,
                        start: "top 90%", // Start animation earlier
                        end: "bottom 10%", // Adjust end position to ensure full animation
                        scrub: 0.5,
                    },
                }
            );

            // Create animation for the second sentence inside this container
            gsap.fromTo(
                $this.find(".animated-words__item--two.animated-words__item--archive"),
                { x: startPositionArchive },
                {
                    x: "0%",
                    immediateRender: false,
                    scrollTrigger: {
                        trigger: $this,
                        start: "top 90%", // Start animation earlier
                        end: "bottom 10%", // Adjust end position to ensure full animation
                        scrub: 0.5,
                    },
                }
            );
        } else {
            // Original animation for non-archive items
            gsap.fromTo(
                $this.find(".animated-words__item--one"),
                { x: `-${startPosition}` },
                {
                    x: "0%",
                    immediateRender: false,
                    scrollTrigger: {
                        trigger: $this,
                        start: "top 100%",
                        end: "bottom 40%",
                        scrub: true,
                    },
                }
            );

            gsap.fromTo(
                $this.find(".animated-words__item--two"),
                { x: startPosition },
                {
                    x: "0%",
                    immediateRender: false,
                    scrollTrigger: {
                        trigger: $this,
                        start: "top 100%",
                        end: "bottom 40%",
                        scrub: true,
                    },
                }
            );
        }
    });
});
