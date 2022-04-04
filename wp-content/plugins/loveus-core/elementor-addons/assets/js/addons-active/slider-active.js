(function ($) {
    "use strict";
    var loveCarousel = function ($scope, $) {
        if ($('.love-carousel').length) {
                $(".love-carousel").each(function (index) {
                var $owlAttr = {},
                $extraAttr = $(this).data("options");
                $.extend($owlAttr, $extraAttr);
                $(this).owlCarousel($owlAttr);
            });
        }
    }
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/loveus_populer_causes.default', loveCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/insta_gallery_one.default', loveCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/volunteer_area__o.default', loveCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/people_slider__o.default', loveCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/events.default', loveCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/loveus_review_are.default', loveCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/dnors_list__o.default', loveCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/loveus_sponsors__o.default', loveCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/banner_slider__o.default', loveCarousel);
    });
})(jQuery);
