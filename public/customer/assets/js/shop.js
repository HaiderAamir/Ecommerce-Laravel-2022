(function ($) {
    'use strict';
    /*Product Details*/
    var productDetails = function () {
        $('.product-image-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: false,
            asNavFor: '.slider-nav-thumbnails',
			prevArrow: '<button type="button" class="slick-prev"><i class="fi-rs-arrow-small-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fi-rs-arrow-small-right"></i></button>'
        });

        $('.slider-nav-thumbnails').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.product-image-slider',
            dots: false,
			arrows: false,
            focusOnSelect: true,

            prevArrow: '<button type="button" class="slick-prev"><i class="fi-rs-arrow-small-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fi-rs-arrow-small-right"></i></button>'
        });

        // Remove active class from all thumbnail slides
        $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');

        // Set active class to first thumbnail slides
        $('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');

        // On before slide change match active thumbnail to current slide
        $('.product-image-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var mySlideNumber = nextSlide;
            $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
            $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
        });

        $('.product-image-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var img = $(slick.$slides[nextSlide]).find("img");
            $('.zoomWindowContainer,.zoomContainer').remove();
            $(img).elevateZoom({
                zoomType: "inner",
                cursor: "crosshair",
                zoomWindowFadeIn: 500,
                zoomWindowFadeOut: 750
            });
        });
        //Elevate Zoom
        if ( $(".product-image-slider").length ) {
            $('.product-image-slider .slick-active img').elevateZoom({
                zoomType: "inner",
                cursor: "crosshair",
                zoomWindowFadeIn: 500,
                zoomWindowFadeOut: 750
            });
        }
        //Filter color/Size
        $('.list-filter').each(function () {
            $(this).find('a').on('click', function (event) {
                event.preventDefault();
                $(this).parent().siblings().removeClass('active');
                $(this).parent().toggleClass('active');
                $(this).parents('.attr-detail').find('.current-size').text($(this).text());
                $(this).parents('.attr-detail').find('.current-color').text($(this).attr('data-color'));
            });
        });
//mycode haider
        $('.d-qty').each(function () {
            var qtval = parseInt($(this).find('.q-val').text(), 10);
            $('.q-up').on('click', function (event) {
                event.preventDefault();
                qtval = qtval + 1;
                $(this).prev().text(qtval);
            });
            $('.q-down').on('click', function (event) {
                event.preventDefault();
                qtval = qtval - 1;
                if (qtval > 1) {
                    $(this).next().text(qtval);
                } else {
                    qtval = 1;
                    $(this).next().text(qtval);
                }
            });
        });
//mycode haider

            $('.qty-up').on('click', function (event) {
                var qtyval = parseInt($(this).siblings(".qty_new").text());
                event.preventDefault();
                qtyval = qtyval + 1;
                let par = $(this).parents("tr");
                let ch = $(par).find("span.qty-val");
                let total_p = parseInt($(par).find("span.total_price").text());
                $(par).find("td span.total_show").text((total_p*qtyval));
                $(this).prev().text(qtyval);
                $(ch).text(qtyval);

                let data_total = 0;

                let total_xyz = $(".total_show");
                console.log(total_xyz);
                for(let i =0; i<total_xyz.length; i++)
                {
                    data_total += parseInt($(total_xyz[i]).text())
                }
                $(".check_data1").text(data_total);
            });
            $('.qty-down').on('click', function (event) {
                event.preventDefault();
                var qtyval = parseInt($(this).siblings(".qty_new").text());
                qtyval = qtyval - 1;
                if (qtyval > 1) {
                    let par = $(this).parents("tr");
                    let ch = $(par).find("span.qty-val");
                    let total_p = parseInt($(par).find("span.total_price").text());
                    $(par).find("td span.total_show").text((total_p*qtyval));
                    $(this).prev().text(qtyval);
                    $(ch).text(qtyval);
                    } else {
                        let par = $(this).parents("tr");
                    let ch = $(par).find("span.qty-val");
                    let total_p = parseInt($(par).find("span.total_price").text());
                    $(par).find("td.total_show").text((total_p*qtyval));
                    $(this).prev().text(qtyval);
                    qtyval =1;
                    $(ch).text(qtyval);
                }
                let data_total = 0;

                let total_xyz = $(".total_show");
                console.log(total_xyz);
                for(let i =0; i<total_xyz.length; i++)
                {
                    data_total += parseInt($(total_xyz[i]).text())
                }
                $(".check_data1").text(data_total);
            });


        $('.dropdown-menu .cart_list').on('click', function (event) {
            event.stopPropagation();
        });
    };

    //Load functions
    $(document).ready(function () {
        productDetails();
    });

})(jQuery);
