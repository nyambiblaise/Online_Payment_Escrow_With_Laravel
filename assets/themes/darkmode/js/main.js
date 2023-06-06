(function ($) {
    "user strict";
    // Preloader Js
    $(window).on('load', function () {
        $('.loader').fadeOut(1000);
        var img = $('.bg_img');
        img.css('background-image', function () {
            var bg = ('url(' + $(this).data('background') + ')');
            return bg;
        });

    });
    $(document).ready(function () {
        $('.select-bar').niceSelect();
        $('.faq-wrapper .faq-title').on('click', function (e) {
            var element = $(this).parent('.faq-item');
            if (element.hasClass('open')) {
                element.removeClass('open');
                element.find('.faq-content').removeClass('open');
                element.find('.faq-content').slideUp(300, "swing");
            } else {
                element.addClass('open');
                element.children('.faq-content').slideDown(300, "swing");
                element.siblings('.faq-item').children('.faq-content').slideUp(300, "swing");
                element.siblings('.faq-item').removeClass('open');
                element.siblings('.faq-item').find('.faq-title').removeClass('open');
                element.siblings('.faq-item').find('.faq-content').slideUp(300, "swing");
            }
        });

        $("ul>li>.submenu").parent("li").addClass("menu-item-has-children");
        $('.header-bar').on('click', function () {
            $(this).toggleClass('active');
            $('.overlay').toggleClass('active');
            $('.menu').toggleClass('active');
            $('.right__menu').removeClass('active');
        })
        $('.right__menu_show').on('click', function () {
            $('.right__menu').toggleClass('active');
            $('.menu').removeClass('active');
        })
        $('.overlay').on('click', function () {
            $(this).removeClass('active');
            $('.header-bar').removeClass('active');
            $('.menu').removeClass('active');
        })
        var scrollPosition = window.scrollY;
        if (scrollPosition >= 1) {
            $("header").addClass('active');
        }
        var header = $("header");
        $(window).on('scroll', function () {
            if ($(this).scrollTop() < 1) {
                header.removeClass("active");
            } else {
                header.addClass("active");
            }
        });
        $('.stake__opponent').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 4,
                },
                400: {
                    items: 5,
                },
                768: {
                    items: 7,
                },
                992: {
                    items: 12,
                },
            }
        })

        $('.client-slider').owlCarousel({
            loop: true,
            margin: 30,
            responsiveClass: true,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive:{
                0:{
                    items:1,
                },
                576:{
                    items:2,
                },
                992:{
                    items:3,
                },
                1350:{
                    items:3,
                }
            }
        })

        // Partner carousel
        $('.partner-carousel').owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplaySpeed: 500,
            autoplayHoverPause: true,
            dots: false,
            margin: 20,
            thumbs: false,
            responsive: {
                0: {
                    items: 2
                },
                576: {
                    items: 3
                },
                992: {
                    items: 8
                },
            }
        });


        var slide1 = $(".slide1");
        var slide2 = $(".slide2");
        var thumbnailItemClass = '.owl-item';
        var slides = slide1.owlCarousel({
            items: 1,
            loop: false,
            margin: 0,
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            scrollPerPage: true,
            nav: false,
            dots: false,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            autoplay: true,
            autoHeight: true,
        }).on('changed.owl.carousel', syncPosition);

        function syncPosition(el) {
            $owl_slider = $(this).data('owl.carousel');
            var loop = $owl_slider.options.loop;

            if (loop) {
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
            } else {
                var current = el.item.index;
            }

            var owl_thumbnail = slide2.data('owl.carousel');
            var itemClass = "." + owl_thumbnail.options.itemClass;

            var thumbnailCurrentItem = slide2
                .find(itemClass)
                .removeClass("synced")
                .eq(current);
            thumbnailCurrentItem.addClass('synced');

            if (!thumbnailCurrentItem.hasClass('active')) {
                var duration = 500;
                slide2.trigger('to.owl.carousel', [current, duration, true]);
            }
        }


        var thumbs = slide2.owlCarousel({
            items: 3,
            loop: false,
            margin: 20,
            nav: true,
            dots: false,
            autoplay: true,
            responsive: {
                500: {
                    items: 4,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 4,
                },
                1200: {
                    items: 5,
                },
            },
            onInitialized: function (e) {
                var thumbnailCurrentItem = $(e.target).find(thumbnailItemClass).eq(this._current);
                thumbnailCurrentItem.addClass('synced');
            },
        })
            .on('click', thumbnailItemClass, function (e) {
                e.preventDefault();
                var duration = 500;
                var itemIndex = $(e.target).parents(thumbnailItemClass).index();
                slide1.trigger('to.owl.carousel', [itemIndex, duration, true]);
            }).on("changed.owl.carousel", function (el) {
                var number = el.item.index;
                $owl_slider = slide1.data('owl.carousel');
                $owl_slider.to(number, 500, true);
            });
        slide1.owlCarousel();
        $(".owl-prev").html('<i class="las la-angle-left"></i>');
        $(".owl-next").html('<i class="las la-angle-right"></i>');

        $('.social-icons li a').on('mouseover', function (e) {
            var social = $(this).parent('li');
            if (social.children('a').hasClass('active')) {
                social.siblings('li').children('a').removeClass('active');
                $(this).addClass('active');
            } else {
                social.siblings('li').children('a').removeClass('active');
                $(this).addClass('active');
            }
        });




    });


})(jQuery);
