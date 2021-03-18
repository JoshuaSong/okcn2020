
;(function($){
	$(document).ready(function(){

		"use strict";

		/***************************************************
		1. FORM
		***************************************************/
		
		Placeholdem( document.querySelectorAll( '[placeholder]' ) );


		/***************************************************
		2. MOBILE
		***************************************************/

		$.shifter({ maxWidth: Infinity });

		/***************************************************
		3. SLIDERS
		***************************************************/

		$('.main-slider').owlCarousel({
				animateOut: 'pulse',
				animateIn: 'pulse',
				loop:true,
				margin:10,
				nav:true,
				autoplay:true,
				navText: [
				'',
				''
			],
		    items:1
		})

		$('.big-album-slider').owlCarousel({
				loop:true,
				margin:10,
				nav:true,
				autoplay:false,
				navText: [
				'',
				''
			],
		    items:2,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				}
			}
		})

		$('.small-album-slider').owlCarousel({
				loop:true,
				margin:10,
				nav:true,
				autoplay:false,
				navText: [
				'',
				''
			],
		    items:1
		})

		$('.video-slider').owlCarousel({
				loop:true,
				margin:10,
				nav:true,
				autoplay:false,
				navText: [
				'',
				''
			],
		    items:1
		})

		$('.newest-photos-slider').owlCarousel({
				loop:true,
				margin:10,
				nav:true,
				autoplay:false,
				navText: [
				'',
				''
			],
		    items:1
		})

		$('.big-album-slider-onepage').owlCarousel({
				loop:true,
				margin:10,
				nav:true,
				autoplay:false,
				navText: [
				'',
				''
			],
		    items:4,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:3
				},
				1100:{
					items:4
				}
			}
		});

		/***************************************************
		4. COUNTDOWN
		***************************************************/

		$('#countdown').countdown({until: new Date(2016, 8-1, 28), padZeroes: true});

		$('#countdown-event').countdown({until: new Date(2016, 1-1, 23), padZeroes: true});

		$('#countdown-full').countdown({until: new Date(2015, 12-1, 23), padZeroes: true});

		/***************************************************
		5. ALBUMS HOVER & NEWEST PHOTO HEIGHT
		***************************************************/

			$( ".album-slider .dim").hoverIntent(
			  function() {
				$(this).find("ul").stop( true, true ).slideToggle( "slow", function() {
				});
				$(this).css('background-color', 'rgba(61, 61, 92, 0.7)')
			  }, function() {
				$(this).find(" ul" ).stop( true, true ).slideToggle( "slow", function() {
				});
				$(this).css('background-color', 'rgba(61, 61, 92, 0)')
			  }
			);

			/***************************************************
			6. PLAYERS
			***************************************************/

			var description = '';

			$('.main-player').ttwMusicPlayer(myPlaylist, {
				autoPlay:false,
				tracksToShow:4,
				description:description,
				jPlayer:{
					swfPath:'/libs'
				}
			});

			/***************************************************
			7. SHOW SEARCH
			***************************************************/

			$('.search-toggle').on('click', function(event) {
				event.preventDefault();
				$('.top-search').toggle('slow', function() {
					return false;
				});
			});

			/***************************************************
			8. GALLERY OPEN
			***************************************************/

			$("#gallery").lightGallery();

			$( ".gallery li").hoverIntent(
			  function() {
				$(this).find(".hover").stop( true, true ).slideToggle( "normal", function() {
				});
			  }, function() {
				$(this).find(".hover" ).stop( true, true ).slideToggle( "normal", function() {
				});
			  }
			);

			/***************************************************
			9. CONTACT FORM
			***************************************************/

			var random = Math.ceil((Math.random() * 10));
			
			switch(random) {
				case 1:
					$( "#contact_verify").replaceWith( "<input type='text' id='contact_verify' value='2+7='>" );
					break;
				case 2:
					$( "#contact_verify").replaceWith( "<input type='text' id='contact_verify' value='3+4='>" );
					break;
				case 3:
					$( "#contact_verify").replaceWith( "<input type='text' id='contact_verify' value='1+3='>" );
					break;
				case 4:
					$( "#contact_verify").replaceWith( "<input type='text' id='contact_verify' value='2+5=''>" );
					break;
				case 5:
					$( "#contact_verify").replaceWith( "<input type='text' id='contact_verify' value='7-2='>" );
					break;
				case 6:
					$( "#contact_verify").replaceWith( "<input type='text' id='contact_verify' value='5-3='>" );
					break;
				case 7:
					$( "#contact_verify").replaceWith( "<input type='text' id='contact_verify' value='3+3='>" );
					break;
				case 8:
					$( "#contact_verify").replaceWith( "<input type='text' id='contact_verify' value='4+4='>" );
					break;
				case 9:
					$( "#contact_verify").replaceWith( "<input type='text' id='contact_verify' value='1+4='>" );
					break;
				case 10:
					$( "#contact_verify").replaceWith( "<input type='text' id='contact_verify' value='1+7='>" );
					break;
			}

			$("#contact_button").on('click', function() {

				var contact_verify = $("#contact_verify").val();
				var contact_name = $("#contact_name").val();
				var contact_email = $("#contact_email").val();
				var contact_subject = $("#contact_subject").val();
				var contact_text = $("#contact_text").val();
				var emailReg = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				var dataString = '&name='+ contact_name + '&email=' + contact_email + '&text=' + contact_text + '&subject=' + contact_subject;
				var go = true;
				var emailcheck = false;

				$('#contact_name').removeClass('contact-required');
				$('#contact_email').removeClass('contact-required');
				$('#contact_subject').removeClass('contact-required');
				$('#contact_text').removeClass('contact-required');
				$('#contact_verify').removeClass('contact-required');
				
				switch(random) {
					case 1:
						if (contact_verify != '2+7=9'){
							$('#contact_verify').addClass('contact-required');
							go=false;
						}
						break;
					case 2:
						if (contact_verify != '3+4=7'){
							$('#contact_verify').addClass('contact-required');
							go=false;
						}
						break;
					case 3:
						if (contact_verify != '1+3=4'){
							$('#contact_verify').addClass('contact-required');
							go=false;
						}
						break;
					case 4:
						if (contact_verify != '2+5=7'){
							$('#contact_verify').addClass('contact-required');
							go=false;
						}
						break;
					case 5:
						if (contact_verify != '7-2=5'){
							$('#contact_verify').addClass('contact-required');
							go=false;
						}
						break;
					case 6:
						if (contact_verify != '5-3=2'){
							$('#contact_verify').addClass('contact-required');
							go=false;
						}
						break;
					case 7:
						if (contact_verify != '3+3=6'){
							$('#contact_verify').addClass('contact-required');
							go=false;
						}
						break;
					case 8:
						if (contact_verify != '4+4=8'){
							$('#contact_verify').addClass('contact-required');
							go=false;
						}
						break;
					case 9:
						if (contact_verify != '1+4=5'){
							$('#contact_verify').addClass('contact-required');
							go=false;
						}
						break;
					case 10:
						if (contact_verify != '1+7=8'){
							$('#contact_verify').addClass('contact-required');
							go=false;
						}
						break;
				}

				if(contact_name=='Name'){
				$('#contact_name').addClass('contact-required');
				go=false;
				}

				if(contact_name==''){
				$('#contact_name').addClass('contact-required');
				go=false;
				}

				if(contact_email=='Email'){
				$('#contact_email').addClass('contact-required');
				go=false;
				}
				else if(contact_email==''){
				$('#contact_email').addClass('contact-required');
				go=false;
				}
				else if(emailReg.test(contact_email)){
				emailcheck = true;
				}
				else {
				$('#contact_email').addClass('contact-required');
				go=false;
				}

				if(contact_subject=='Subject'){
				$('#contact_subject').addClass('contact-required');
				go=false;
				}

				if(contact_subject==''){
				$('#contact_subject').addClass('contact-required');
				go=false;
				}

				if(contact_text=='Message'){
				$('#contact_text').addClass('contact-required');
				go=false;
				}

				if(contact_text==''){
				$('#contact_text').addClass('contact-required');
				go=false;
				}

				if ( go == false){
				 return false;
				}

				 $.ajax({
					type: "POST",
					url: "email.php",
					data: dataString,
					success: function(){
					$( "#contact_button").replaceWith( "<input type='submit' id='contact_button' class='button small style-4 sent'  value='Message sent, thank you!'/>" );
					}
				});

				$('.contact-form').get(0).reset();
				return false;
			});

			/***************************************************
			10. ACCORDION
			***************************************************/

		  var allPanels = $('.accordion > dd').hide();

		  $('.accordion > dt > a').on('click', function(event) {
		    allPanels.slideUp();
		    $(this).parent().next().slideDown();
		    return false;
		  });

	});

	$(window).resize(function(){

		"use strict";

		/***************************************************
		NEWEST PHOTO HEIGHT
		***************************************************/
		
		$('.newest-photos-slider ul li').height($('.newest-photos-slider ul li').width());
		
	});

})(jQuery);

/***************************************************
18. SCROLL TO
***************************************************/

function ScrollTo(id){
	"use strict";
	jQuery('html,body').animate({scrollTop: jQuery("#"+id).offset().top},3000);
}
