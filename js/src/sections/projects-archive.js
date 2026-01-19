document.addEventListener("DOMContentLoaded", function () {
    function updatePaginationActiveState() {
        const urlParams = new URLSearchParams(window.location.search);
        const currentPage = urlParams.get("sf_paged") || 1;

        document.querySelectorAll(".projects__pagination .pagination a").forEach((link) => {
            link.classList.remove("current");
        });

        document.querySelectorAll(".projects__pagination .pagination span").forEach((span) => {
            span.classList.remove("current");
        });

        document.querySelectorAll(".projects__pagination .pagination a").forEach((link) => {
            const href = link.getAttribute("href");
            if (href) {
                const hrefParams = new URLSearchParams(href.split("?")[1]);
                const pageNumber = hrefParams.get("sf_paged") || 1;

                if (parseInt(pageNumber) === parseInt(currentPage)) {
                    link.classList.add("current");
                }
            }
        });

        document.querySelectorAll(".projects__pagination .pagination span").forEach((span) => {
            const pageText = span.textContent;
            if (!isNaN(pageText) && parseInt(pageText) === parseInt(currentPage)) {
                span.classList.add("current");
            }
        });
    }

    updatePaginationActiveState();

    if (typeof SearchAndFilter !== "undefined") {
        document.addEventListener("sf:ajaxfinish", function () {
            setTimeout(updatePaginationActiveState, 100);
        });

        document.addEventListener("click", function (e) {
            const paginationLink = e.target.closest(".projects__pagination .pagination a");

            if (paginationLink && !paginationLink.classList.contains("current")) {
                e.preventDefault();

                const href = paginationLink.getAttribute("href");
                const url = new URL(href, window.location.origin);
                const searchParams = new URLSearchParams(url.search);
                const pageNumber = searchParams.get("sf_paged") || 1;

                window.history.pushState({}, "", href);

                if (typeof SearchAndFilter !== "undefined") {
                    const searchForm = document.querySelector(".searchandfilter");
                    if (searchForm) {
                        let pageInput = searchForm.querySelector('input[name="sf_paged"]');

                        if (!pageInput) {
                            pageInput = document.createElement("input");
                            pageInput.type = "hidden";
                            pageInput.name = "sf_paged";
                            searchForm.appendChild(pageInput);
                        }

                        pageInput.value = pageNumber;

                        const submitEvent = new Event("submit", {
                            bubbles: true,
                            cancelable: true,
                        });
                        searchForm.dispatchEvent(submitEvent);
                    }
                }

                updatePaginationActiveState();
            }
        });
    }
});
