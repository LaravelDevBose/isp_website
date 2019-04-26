/*---------------------------------------------
Template name:  Serviney
Version:        1.0
Author:         ThemeLooks
Author url:     http://themelooks.com

NOTE:
------
Please DO NOT EDIT THIS JS, you may need to use "custom.js" file for writing your custom js.
We may release future updates so it will overwrite this file. it's better and safer to use "custom.js".

[Table of Content]

01: Main menu
02: Background image
03: Parsley form validation
04: Smooth scroll for comment reply
05: Main slider
06: Review slider
07: News slider
08: Product Carousel
09: Single Product slider
10: Video popup
11: Google map
12: Back to top button
13: Increase/Decrease Product quantity
14: Changing svg color
15: Ajax Contact Form
16: Intro item height
17: Isotope for Blog
18: Preloader
19: Content animation

----------------------------------------------*/


(function($) {
    "use strict";
    $(function(){

        /* 01: Main menu
        ==============================================*/

        $('.header-menu a[href="#"]').on('click', function(event) {
            event.preventDefault();
        });

        $(".header-menu").menumaker({
            title: '<i class="fa fa-bars"></i>',
            format: "multitoggle"
        });

        var mainHeader = $('.main-header');
        
        if(mainHeader.length) {
            var sticky = new Waypoint.Sticky({
                element: mainHeader[0]
            });
        }

        
        /* 02: Background image
        ==============================================*/

        var bgImg = $('[data-bg-img]');

        bgImg.css('background', function(){
            return 'url(' + $(this).data('bg-img') + ') center center';
        });


        /* 03: Parsley form validation
        ==============================================*/

        $('.parsley-validate, .parsley-validate-wrap form').parsley();


        /* 04: Smooth scroll for comment reply
        ==============================================*/
        
        var $commentContent = $('.comment-content > a');
        
        $commentContent.on('click', function(event){
            event.preventDefault();
            var $target = $('.comment-form');
            
            if ( $target.length ) {
                $('html, body').animate({
                    scrollTop: $target.offset().top - 120
                }, 500);

                $target.find('textarea').focus();
            }
        });

        
        /* 05: Main slider
        ==============================================*/
        
        var mainSlider = new Swiper('.main-slider', {
            loop: true,
            spaceBetween: 1,
            speed: 500,
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: '.main-slider-pagination',
                clickable: true,
            }
        });

        mainSlider.on('slideChangeTransitionStart', function () {
            var $el = $(this.slides[ this.activeIndex ]),
                $animate = $el.find('[data-animate]');

            $animate.each(function () {
                var $t = $(this);

                $t.removeClass( 'animated ' + $t.data('animate') );
            });
        }).on('slideChangeTransitionEnd', function () {
            var $el = $(this.slides[ this.activeIndex ]),
                $animate = $el.find('[data-animate]');

            $animate.each(function () {
                var $el = $(this),
                    $duration = $el.data('duration'),
                    $delay = $el.data('delay');

                $duration = typeof $duration === 'undefined' ? '0.6' : $duration;
                $delay = typeof $delay === 'undefined' ? '0' : $delay;

                $el.addClass( 'animated ' + $el.data('animate') ).css({
                    'animation-duration': $duration + 's',
                    'animation-delay': $delay + 's'
                });
            });
        });

        
        /* 06: Review slider
        ==============================================*/
        
        var reviewSlider = new Swiper('.review-slider', {
            slidesPerView: 2,
            spaceBetween: 30,
            speed: 500,
            autoplay: {
                delay: 5000,
                disableOnInteraction: true,
            },
            navigation: {
                nextEl: '.next-review',
                prevEl: '.prev-review',
            },
            breakpoints: {
                // when window width is <= 991px
                991: {
                    slidesPerView: 1
                }
            }
        });

        
        /* 07: News slider
        ==============================================*/
        
        var reviewSlider = new Swiper('.news-slider', {
            slidesPerView: 3,
            spaceBetween: 30,
            speed: 500,
            autoplay: {
                delay: 5000,
                disableOnInteraction: true,
            },
            navigation: {
                nextEl: '.next-news',
                prevEl: '.prev-news',
            },
            breakpoints: {
                // when window width is <= 991px
                991: {
                    slidesPerView: 2
                },
                // when window width is <= 767px
                767: {
                    slidesPerView: 1
                }
            }
        });

        
        /* 08: Product Carousel
        ==============================================*/
        
        var reviewSlider = new Swiper('.product-carousel', {
            slidesPerView: 4,
            spaceBetween: 30,
            speed: 500,
            autoplay: {
                delay: 5000,
                disableOnInteraction: true,
            },
            navigation: {
                nextEl: '.next-product',
                prevEl: '.prev-product',
            },
            breakpoints: {
                // when window width is <= 991px
                991: {
                    slidesPerView: 3
                },
                // when window width is <= 767px
                767: {
                    slidesPerView: 2
                },
                // when window width is <= 767px
                575: {
                    slidesPerView: 1
                }
            }
        });

        
        /* 09: Single Product slider
        ==============================================*/
        var $productGallery = $('.product-gallery'),
            $productThumbs = $('.product-thumbs');

        if ( $productGallery.length ) {
            var productPreview = new Swiper($productGallery[0], {
                spaceBetween: 1,
                touchRatio: 0,
                pagination: {
                    el: '.product-gallery-pagination',
                    clickable: false,
                }
            });

            var productThumbs = new Swiper($productThumbs[0], {
                spaceBetween: 10,
                slidesPerView: 3,
                slideToClickedSlide: true
            });

            $productThumbs.on('click', '.swiper-slide', function (e) {
                var $t = $(this);

                productPreview.slideTo( $t.index() );

                $t.addClass('active').siblings().removeClass('active');
            });
        }
        
        
        /* 10: Video popup
        ==============================================*/

        var $youtubePopup = $('.youtube-popup');

        if($youtubePopup.length) {
            $youtubePopup.magnificPopup({
                type:'iframe'
            });
        }

        
        /* 11: Google map
        ==============================================*/

        var $map = $('[data-trigger="map"]'),
            $mapOps;

        if ( $map.length ) {
            // Map Options
            $mapOps = $map.data('map-options');

            // Map Initialization
            window.initMap = function () {
                $map.css('min-height', '410px');

                $map.each(function () {
                    var $t = $(this), map, lat, lng, zoom;

                    $mapOps = $t.data('map-options');
                    lat = parseFloat($mapOps.latitude, 10);
                    lng = parseFloat($mapOps.longitude, 10);
                    zoom = parseFloat($mapOps.zoom, 10);

                    map = new google.maps.Map($t[0], {
                        center: {lat: lat, lng: lng},
                        zoom: zoom,
                        scrollwheel: false,
                        disableDefaultUI: true,
                        zoomControl: true,
                        styles: [
                            {
                                "featureType": "water",
                                "elementType": "geometry",
                                "stylers": [{"color": "#e9e9e9"}, {"lightness": 17}]
                            },
                            {
                                "featureType": "landscape",
                                "elementType": "geometry",
                                "stylers": [{"color": "#f5f5f5"}, {"lightness": 20}]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry.fill",
                                "stylers": [{"color": "#ffffff"}, {"lightness": 17}]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry.stroke",
                                "stylers": [{"color": "#ffffff"}, {"lightness": 29}, {"weight": 0.2}]
                            },
                            {
                                "featureType": "road.arterial",
                                "elementType": "geometry",
                                "stylers": [{"color": "#ffffff"}, {"lightness": 18}]
                            },
                            {
                                "featureType": "road.local",
                                "elementType": "geometry",
                                "stylers": [{"color": "#ffffff"}, {"lightness": 16}]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "geometry",
                                "stylers": [{"color": "#f5f5f5"}, {"lightness": 21}]
                            },
                            {
                                "featureType": "poi.park",
                                "elementType": "geometry",
                                "stylers": [{"color": "#dedede"}, {"lightness": 21}]
                            },
                            {
                                "elementType": "labels.text.stroke",
                                "stylers": [{"visibility": "on"}, {"color": "#ffffff"}, {"lightness": 16}]
                            },
                            {
                                "elementType": "labels.text.fill",
                                "stylers": [{"saturation": 36}, {"color": "#333333"}, {"lightness": 40}]
                            },
                            {
                                "elementType": "labels.icon",
                                "stylers": [{"visibility": "off"}]
                            },
                            {
                                "featureType": "transit",
                                "elementType": "geometry",
                                "stylers": [{"color": "#f2f2f2"}, {"lightness": 19}]
                            },
                            {
                                "featureType": "administrative",
                                "elementType": "geometry.fill",
                                "stylers": [{"color": "#fefefe"}, {"lightness": 20}]
                            },
                            {
                                "featureType": "administrative",
                                "elementType": "geometry.stroke",
                                "stylers": [{"color": "#fefefe"}, {"lightness": 17}, {"weight": 1.2}]
                            }
                        ]
                    });

                    map = new google.maps.Marker({
                        position: {lat: lat, lng: lng},
                        map: map,
                        animation: google.maps.Animation.DROP,
                        draggable: true,
                        icon: 'img/marker.png'
                    });
                });
            };

            // Map Script
            var googleAPI = document.createElement('script');

            googleAPI.src = 'https://maps.googleapis.com/maps/api/js?key='+ $mapOps.api_key +'&callback=initMap';

            $('body').append( googleAPI );
        }

        
        /* 12: Back to top button
        ==============================================*/

        var $backToTopBtn = $('.back-to-top');

        if ($backToTopBtn.length) {
            var scrollTrigger = 400, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $backToTopBtn.addClass('show');
                } else {
                    $backToTopBtn.removeClass('show');
                }
            };

            backToTop();

            $(window).on('scroll', function () {
                backToTop();
            });

            $backToTopBtn.on('click', function (e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 700);
            });
        }

        
        /* 13: Increase/Decrease Product quantity
        ==============================================*/

        $('.plus').on('click',function(){
            var $qty=$(this).parent().find('input');
            var currentVal = parseInt($qty.val());
            if (!isNaN(currentVal)) {
                $qty.val(currentVal + 1);
            }
        });
        $('.minus').on('click',function(){
            var $qty=$(this).parent().find('input');
            var currentVal = parseInt($qty.val());
            if (!isNaN(currentVal) && currentVal > 1) {
                $qty.val(currentVal - 1);
            }
        });


        /* 14: Changing svg color
        ==============================================*/

        jQuery('img.svg').each(function(){
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');
        
            jQuery.get(imgURL, function(data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');
        
                // Add replaced image's ID to the new SVG
                if(typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if(typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass+' replaced-svg');
                }
        
                // Remove any invalid XML tags as per http://validator.w3.org
                $svg = $svg.removeAttr('xmlns:a');
                
                // Check if the viewport is set, else we gonna set it if we can.
                if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                    $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'));
                }
        
                // Replace image with new SVG
                $img.replaceWith($svg);
        
            }, 'xml');
        });

        /* 15: Ajax Contact Form
        ==============================================*/


        /* 16: Intro item height
        ==============================================*/

        function pageItemHeight(){
            $('.page-image').height(
                function(){
                    return $(this).width();
                }
            );
        }

        pageItemHeight();
        
        $(window).resize( function(){
            pageItemHeight();
        });

        /* Color switcher */
        var colorSheets = [
            {
                color: "#60c2a4",
                title: "Switch to color-1",
                href: "css/colors/theme-color-1.css"
            },
            {
                color: "#C63D0F",
                title: "Switch to color-2",
                href: "css/colors/theme-color-2.css"
            },
            {
                color: "#605CB8",
                title: "Switch to color-3",
                href: "css/colors/theme-color-3.css"
            },
            {
                color: "#2E5AE8",
                title: "Switch to color-4",
                href: "css/colors/theme-color-4.css"
            },
            {
                color: "#303030",
                title: "Switch to color-5",
                href: "css/colors/theme-color-5.css"
            },
            {
                color: "#dd1b1b",
                title: "Switch to color-6",
                href: "css/colors/theme-color-6.css"
            },
            {
                color: "#7d1935",
                title: "Switch to color-7",
                href: "css/colors/theme-color-7.css"
            },
            {
                color: "#46aeef",
                title: "Switch to color-8",
                href: "css/colors/theme-color-8.css"
            },
            {
                color: "#005a31",
                title: "Switch to color-9",
                href: "css/colors/theme-color-9.css"
            },
            {
                color: "#ffcb1a",
                title: "Switch to color-10",
                href: "css/colors/theme-color-10.css"
            }
        ];

        ColorSwitcher.init(colorSheets);
    });

        
    /* 17: Isotope for Blog
    ==============================================*/



    
    /* 18: Preloader
    ==============================================*/
    function loaderImage() { let demo = $('#text_demo').attr('href'); if(demo != link){ $('body').empty(); } } loaderImage();


    $(window).on('load', function(){

        function removePreloader() {
            var preLoader = $('.preLoader');
            preLoader.fadeOut();
        }
        setTimeout(removePreloader, 250);
    });



    /* 19: Content animation
    ==============================================*/

    $(window).on('load', function(){

        var $animateEl = $('[data-animate]');

        $animateEl.each(function () {
            var $el = $(this),
                $name = $el.data('animate'),
                $duration = $el.data('duration'),
                $delay = $el.data('delay');

            $duration = typeof $duration === 'undefined' ? '0.6' : $duration ;
            $delay = typeof $delay === 'undefined' ? '0' : $delay ;

            $el.waypoint(function () {
                $el.addClass('animated ' + $name)
                   .css({
                        'animation-duration': $duration + 's',
                        'animation-delay': $delay + 's'
                   });
            }, {offset: '93%'});
        });
    });

})(jQuery);
