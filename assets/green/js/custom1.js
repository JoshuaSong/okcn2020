
(function($){
	$(document).ready(function(){

		"use strict";

		
		Placeholdem( document.querySelectorAll( '[placeholder]' ) );

		$.shifter({ maxWidth: Infinity });




	});

	$(window).resize(function(){

		"use strict";

		
		$('.newest-photos-slider ul li').height($('.newest-photos-slider ul li').width());
		
	});

})(jQuery);


function ScrollTo(id){
	"use strict";
	jQuery('html,body').animate({scrollTop: jQuery("#"+id).offset().top},3000);
}
