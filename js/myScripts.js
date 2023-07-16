$(document).ready(function() {


    jQuery(document).ready(function(){
        $(".dropdown").hover(
            function() { $('.dropdown-menu', this).stop().fadeIn("fast");
            },
            function() { $('.dropdown-menu', this).stop().fadeOut("fast");
            });
    });


    // diamonds script
    $(".diamond-grid.marble").diamonds({
        size : 150, // Size of diamonds in pixels. Both width and height.
        gap : 0, // Pixels between each square.
        hideIncompleteRow : false, // Hide last row if there are not enough items to fill it completely.
        autoRedraw : true, // Auto redraw diamonds when it detects resizing.
        itemSelector : ".item" // the css selector to use to select diamonds-items.
    });

    $(".diamond-grid.granite").diamonds({
        size : 150, // Size of diamonds in pixels. Both width and height.
        gap : 0, // Pixels between each square.
        hideIncompleteRow : false, // Hide last row if there are not enough items to fill it completely.
        autoRedraw : true, // Auto redraw diamonds when it detects resizing.
        itemSelector : ".item" // the css selector to use to select diamonds-items.
    });


    AOS.init();

    let home_url = $('#home_url').val();
    jQuery('.woof_container_inner.woof_container_inner_type ul').prepend('<li class=""><input type="radio" class="woof_radio_term"><label class="woof_radio_label "><a href="'+home_url+'">All</a></label></li>');


    jQuery('.section-three .carousel-inner .carousel-item:first-child').addClass('active');






}); // document ready

function animate_to_left(){

   $('.animated_result').show();
   $('.home_page').hide();
}

function animate_to_right(){

    $('.animated_result').hide();
    $('.home_page').show();
}

$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});