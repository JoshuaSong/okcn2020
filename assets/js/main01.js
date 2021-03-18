jQuery(document).on("ready", function ($) {
    "use strict";
    /* ScrolltoTop Active*/
    
    /* PrettyPhoto Active */

    /* JP Player Active */
   
  

    /* 3. Mainmenu sticky Js
    --------------------------------- */
    function sticky_relocate() {
        var window_top = $(window).scrollTop();
        var div_top = $('#sticky-helper').offset().top;
        if (window_top > div_top) {
            $('.mainmenu-area').addClass('stick');
        } else {
            $('.mainmenu-area').removeClass('stick');
        }
    }
    $(window).scroll(sticky_relocate);
    sticky_relocate();
}(jQuery));