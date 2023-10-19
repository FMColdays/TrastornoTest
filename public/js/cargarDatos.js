$(document).ready(function () {
    let elemento = document
        .querySelector(".contenedor-index > div")
        .getAttribute("id")
        .split("-")[0];

    let nextPageUrl = document
        .getElementById(`${elemento}-contenedor`)
        .getAttribute("data-next-page");

    window.addEventListener("scroll", () => {
        let windowHeight = window.innerHeight;

        let windowScrollTop =
            window.pageYOffset || document.documentElement.scrollTop;

        let documentHeight = Math.max(
            document.body.scrollHeight,
            document.body.offsetHeight,
            document.documentElement.clientHeight,
            document.documentElement.scrollHeight,
            document.documentElement.offsetHeight
        );

        if (windowScrollTop + windowHeight >= documentHeight - 100) {
            if (nextPageUrl) {
                loadMorePosts();
            }
        }
    });

    function loadMorePosts() {
        $.ajax({
            url: nextPageUrl,
            type: "get",
            beforeSend: function () {
                nextPageUrl = "";
            },
            success: function (data) {
                nextPageUrl = data.nextPageUrl;
                $(`#${elemento}-contenedor`).append(data.view);
            },
            error: function (xhr, status, error) {
                console.error("Error loading more posts:", error);
            },
        });
    }
});
