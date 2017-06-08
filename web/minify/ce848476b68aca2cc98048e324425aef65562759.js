(function($) {
    $(document).ready(function(){
        $(document).on('change', '#location_form', function(e){
            $(e.target).parents('form').submit();
        });
    });
})(jQuery);;
