(function ($) {
    "use strict";

    var lightboxImage = function ($scope, $) {
        //LightBox / Fancybox
        if($('.lightbox-image').length) {
            $('.lightbox-image').fancybox({
                openEffect  : 'fade',
                closeEffect : 'fade',
                helpers : {
                    media : {}
                }
            });
        }
    }
    var lazyImage = function ($scope, $) {
        if($('.lazy-image').length){
            new LazyLoad({
                elements_selector: ".lazy-image",
                load_delay: 0,
                threshold: 300
            });
        }
    }

    $(window).on('elementor/frontend/init', function () {


        elementorFrontend.hooks.addAction('frontend/element_ready/about_area_three.default', lazyImage);
        elementorFrontend.hooks.addAction('frontend/element_ready/loveus_populer_causes.default', lazyImage);
        elementorFrontend.hooks.addAction('frontend/element_ready/banner_slider__o.default', lazyImage);
        elementorFrontend.hooks.addAction('frontend/element_ready/volunteer_area__o.default', lazyImage);
        elementorFrontend.hooks.addAction('frontend/element_ready/insta_gallery_one.default', lazyImage);
        elementorFrontend.hooks.addAction('frontend/element_ready/counter_area__o.default', lazyImage);
        elementorFrontend.hooks.addAction('frontend/element_ready/people_slider__o.default', lazyImage);

        elementorFrontend.hooks.addAction('frontend/element_ready/insta_gallery_one.default', lightboxImage);
        elementorFrontend.hooks.addAction('frontend/element_ready/people_slider__o.default', lightboxImage);
        elementorFrontend.hooks.addAction('frontend/element_ready/protfolio_area.default', lightboxImage);
        elementorFrontend.hooks.addAction('frontend/element_ready/loveus_review_are.default', lightboxImage);
        elementorFrontend.hooks.addAction('frontend/element_ready/dnors_list__o.default', lightboxImage);
        elementorFrontend.hooks.addAction('frontend/element_ready/loveus_sponsors__o.default', lightboxImage);
    });
})(jQuery);