(function($) {
    $('#toggle').toggle( 
        function() {
            $('#popout').animate({ left: 0 }, 'slow', function() {
                $('#toggle').html('<h1>Close open</h1>');
            });
        }, 
        function() {
            $('#popout').animate({ left: -250 }, 'slow', function() {
                $('#toggle').html('<h1>Close</h1>');
            });
        }
    );
    })(jQuery);