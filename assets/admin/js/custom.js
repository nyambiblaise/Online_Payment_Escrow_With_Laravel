$(function() {
    "use strict";
    feather.replace(), $(".preloader").fadeOut(), $(".nav-toggler").on("click", function() {
        $("#main-wrapper").toggleClass("show-sidebar"), $(".nav-toggler i").toggleClass("ti-menu")
    }), $(function() {
        $(".service-panel-toggle").on("click", function() {
            $(".customizer").toggleClass("show-service-panel")
        }), $(".page-wrapper").on("click", function() {
            $(".customizer").removeClass("show-service-panel")
        })
    }), $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    }), $(function() {
        $('[data-toggle="popover"]').popover()
    }), $(".message-center, .customizer-body, .scrollable, .scroll-sidebar").perfectScrollbar({
        wheelPropagation: !0
    }), $("body, .page-wrapper").trigger("resize"), $(".page-wrapper").delay(20).show(), $(".list-task li label").click(function() {
        $(this).toggleClass("task-done")
    }), $(".show-left-part").on("click", function() {
        $(".left-part").toggleClass("show-panel"), $(".show-left-part").toggleClass("ti-menu")
    }), $(".custom-file-input").on("change", function() {
        var e = $(this).val();
        $(this).next(".custom-file-label").html(e)
    })


    $('#navbar_search').on('input', function () {
        var search = $(this).val().toLowerCase();
        var search_result_pane = $('#navbar_search_result_area .navbar_search_result');
        $(search_result_pane).html('');
        if (search.length == 0) {
            return;
        }

        var match = $('#sidebarnav .sidebar-link').filter(function (idx, element) {
            return $(element).text().trim().toLowerCase().indexOf(search) >= 0 ? element : null;
        }).sort();

        if (match.length == 0) {
            $(search_result_pane).append('<li class="text-muted">No search result found.</li>');
            return;
        }

        match.each(function (index, element) {
            var item_url = $(element).attr('href') || $(element).data('default-url');
            var item_text = $(element).text().replace(/(\d+)/g, '').trim();
            $(search_result_pane).append(`<li><a href="${item_url}">${item_text}</a></li>`);
        });
    });
});
