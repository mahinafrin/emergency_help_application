$(document).ready(function () {
    $("table").DataTable({
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"],
        ],
    });
});

function adjustNav() {
    var winWidth = $(window).width(),
        dropdown = $(".dropdown"),
        dropdownMenu = $(".dropdown-menu");

    if (winWidth >= 768) {
        dropdown.on("mouseenter", function () {
            $(this).addClass("show").children(dropdownMenu).addClass("show");
        });

        dropdown.on("mouseleave", function () {
            $(this)
                .removeClass("show")
                .children(dropdownMenu)
                .removeClass("show");
        });
    } else {
        dropdown.off("mouseenter mouseleave");
    }
}

$(window).on("resize", adjustNav);

adjustNav();
