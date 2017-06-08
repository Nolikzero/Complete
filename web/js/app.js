(function($) {
    $(document).ready(function(){
        $(document).on('change', '#location_form', function(e){
            $('#location_form').submit();
        });
    });
})(jQuery);