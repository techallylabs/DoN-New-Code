(function ($) {
    "use strict";
    var filterGla = function ($scope, $) {
        //MixitUp Gallery Filters
        if($('.filter-list').length){
            $('.filter-list').mixItUp({});
        }
    
    }
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/protfolio_area.default', filterGla);
    });
})(jQuery);