$(document).ready(function () {
    let nextPageUrl = $('#estudiantes-contenedor').data('next-page');
    $(window).scroll(function () {
        if (
            $(window).scrollTop() + $(window).height() >=
            $(document).height() - 100
        ) {
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
                $("#estudiantes-contenedor").append(data.view);
            },
            error: function (xhr, status, error) {
                console.error("Error loading more posts:", error);
            },
        });
    }
});



