jQuery( document ).ready( function( $ ){
    "use strict";

    console.log( 'enqueued!' );

    $( 'form.el-escape-link' ).submit( function( event ) {
        event.preventDefault();

        let url = "/wp-content/plugins/escape-links/escape-links-form.php";

        $.ajax({
            method: "POST",
            url: url,
        }).done( function() {
            try {
                window.location.replace('https://www.allrecipes.com');
                window.location.replace('https://www.foodnetwork.com');
            } catch( e ) {
                window.location('https://www.allrecipes.com');
                window.location('https://www.foodnetwork.com');
            }
        });
    });
});