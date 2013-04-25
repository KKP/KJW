(function($){
    $(function(){
        $("#slider").carouFredSel({
            width: 980,
            height: 335,
            items: 1,
            prev: '#sliderprev',
            next: '#slidernext',
            scroll: {
                duration: 1000,
                fx: 'crossfade',
                easing: 'quadratic'
            }
        });
    });
})(jQuery);