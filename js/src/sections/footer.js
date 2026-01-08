document.addEventListener("DOMContentLoaded", function () {
    const grayLogos = document.querySelectorAll(
        ".bottom-bar__images .bottom-bar__logo:not(.bottom-bar__logo--color)"
    );

    function positionColorLogo(grayLogo, colorLogo) {
        const rect = grayLogo.getBoundingClientRect();
        colorLogo.style.left = rect.left + rect.width / 2 + "px";
        colorLogo.style.top = rect.top - 10 + "px";
    }

    grayLogos.forEach(function (grayLogo) {
        const colorLogo = grayLogo.nextElementSibling;
        if (!colorLogo || !colorLogo.classList.contains("bottom-bar__logo--color")) return;

        grayLogo.addEventListener("mouseenter", function () {
            grayLogo.classList.add("is-active");
            positionColorLogo(grayLogo, colorLogo);
        });

        grayLogo.addEventListener("mouseleave", function () {
            grayLogo.classList.remove("is-active");
        });

        grayLogo.addEventListener("click", function (event) {
            event.preventDefault();

            const isAlreadyActive = grayLogo.classList.contains("is-active");

            document
                .querySelectorAll(".bottom-bar__images .bottom-bar__logo.is-active")
                .forEach(function (el) {
                    el.classList.remove("is-active");
                });

            if (!isAlreadyActive) {
                grayLogo.classList.add("is-active");
                positionColorLogo(grayLogo, colorLogo);
            }
        });
    });

    window.addEventListener(
        "scroll",
        function () {
            document
                .querySelectorAll(".bottom-bar__images .bottom-bar__logo.is-active")
                .forEach(function (grayLogo) {
                    const colorLogo = grayLogo.nextElementSibling;
                    if (!colorLogo) return;
                    positionColorLogo(grayLogo, colorLogo);
                });
        },
        { passive: true }
    );

    window.addEventListener(
        "resize",
        function () {
            document
                .querySelectorAll(".bottom-bar__images .bottom-bar__logo.is-active")
                .forEach(function (grayLogo) {
                    const colorLogo = grayLogo.nextElementSibling;
                    if (!colorLogo) return;
                    positionColorLogo(grayLogo, colorLogo);
                });
        },
        { passive: true }
    );

    document.addEventListener("click", function (event) {
        const clickedInsideLogo = !!event.target.closest(".bottom-bar__images .bottom-bar__logo");
        if (clickedInsideLogo) return;

        document
            .querySelectorAll(".bottom-bar__images .bottom-bar__logo.is-active")
            .forEach(function (el) {
                el.classList.remove("is-active");
            });
    });
});
