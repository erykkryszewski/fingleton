import $ from "jquery";

$(document).ready(function () {
    if ($(".location-info__map").length > 0) {
        $(".location-info__map").on("click", function (e) {
            e.preventDefault();
            console.log("xd");

            $("html, body")
                .delay(0)
                .animate(
                    {
                        scrollTop: $("#map").offset().top,
                    },
                    600
                );
        });
    }
});
