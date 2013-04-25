(function($){
    $(function(){
        $('.kjwcontactform').submit(function(e){
            e.preventDefault();
            var $t = $(this);
            var $submit = $(':submit', $t);
            var $loader = $('<span>Please wait...</span>');
            $('.errormsg', $t).remove();
            $submit.replaceWith($loader);
            $.post($t.attr('action'), $t.serializeArray(), function(rs){
                if (rs.status=='SUCCESS') {
                    $t.replaceWith(rs.body);
                } else {
                    for (var i in rs.errors)
                    {
                        $(':input[name="'+i+'"]').after('<div class="errormsg">'+rs.errors[i]+'</div>');
                    }
                    $loader.replaceWith($submit);
                }
            }, 'json');
        });
    });
})(jQuery);