/* eslint-disable no-undef */
/* eslint-disable vars-on-top */
/*!
 * All sorts javascript/jQuery functions
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0.0
 *
 */


/*==================================================================================
  Functions
==================================================================================*/
$( function() {

	/* Global Settings
/––––––––––––––––––––––––*/
	// custom vars that need to be global

	// get current language
	// eslint-disable-next-line no-unused-vars
	var activeLang = $( 'html' ).attr( 'data-lang' );


	/* Hamburger switch
  /––––––––––––––––––––––––*/
	$( function() {
		$( document ).on( 'click', '#hamburger', function() {

			// show overlay
			$( '#menu_main' ).toggleClass( 'hidden_mobile' );

			// switch icon
			$( '#hamburger' ).toggleClass( 'is-active' );

			// prevent content scrolling
			$( 'html' ).toggleClass( 'noscroll' );
		});
	});


	/* WOW
  /––––––––––––––––––––––––*/
	// http://mynameismatthieu.com/WOW/
	$( function() {
		new WOW().init();
	});


	/* Modernizr Fix: 'object-fit'
  /––––––––––––––––––––––––––––––––*/
	// displays images with the object-fit attribute as background-images for older browsers
	$( function() {
		if ( ! Modernizr.objectfit ) {
			$( 'img.mdrnz-of' ).each( function() {

				// Check if image has attribute 'object-fit'
				var $img = $( this );
				imgUrl = $img.prop( 'src' );
				classes = $img.attr( 'class' );
				if ( imgUrl ) {

					// Replace img with a div containing the image as background-image and get background-image value from object-fit
					$img.replaceWith( '<div class="' + classes + '" style="background-image:url(' + imgUrl + ')' );
				}
			});
		}
	});


	/* Smooth Anchor Scrolling
  /––––––––––––––––––––––––*/
	// https://css-tricks.com/snippets/jquery/smooth-scrolling/
	// Select all links with hashes
	$( 'a[href*="#"]' )

	// Remove links that don't actually link to anything
		.not( '[href="#"]' )
		.not( '[href="#0"]' )
		.click( function( event ) {

			// define custom offset (examples: 50 or -200 or (".anchor").height();)
			var customOffset = 0;

			// On-page links
			if ( location.pathname.replace( /^\//, '' ) == this.pathname.replace( /^\//, '' ) && location.hostname == this.hostname ) {

				// Figure out element to scroll to
				var target = $( this.hash );
				target = target.length ? target : $( '[name=' + this.hash.slice( 1 ) + ']' );

				// Does a scroll target exist?
				if ( target.length ) {

					// Only prevent default if animation is actually gonna happen
					event.preventDefault();
					$( 'html, body' ).animate({
						scrollTop: target.offset().top + customOffset
					}, 500, function() {

						// Callback after animation
						// Must change focus!
						var $target = $( target );
						$target.focus();
						if ( $target.is( ':focus' ) ) { // Checking if the target was focused
							return false;
						} else {
							$target.attr( 'tabindex', '-1' ); // Adding tabindex for elements not focusable
							$target.focus(); // Set focus again
						}
					});
				}
			}
		});


	// Stats

	// Remove svg.radial-progress .complete inline styling
	$( 'svg.radial-progress' ).each( function( ) {
		$( this ).find( $( 'circle.complete' ) ).removeAttr( 'style' );
	});

	// Activate progress animation on scroll
	$( window ).scroll( function() {
		$( 'svg.radial-progress' ).each( function( index, value ) {

			// If svg.radial-progress is approximately 25% vertically into the window when scrolling from the top or the bottom
			if (
				$( window ).scrollTop() > $( this ).offset().top - ( $( window ).height() * 0.75 ) &&
          $( window ).scrollTop() < $( this ).offset().top + $( this ).height() - ( $( window ).height() * 0.25 )
			) {

				// Get percentage of progress
				percent = $( value ).data( 'percentage' );

				// Get radius of the svg's circle.complete
				radius = $( this ).find( $( 'circle.complete' ) ).attr( 'r' );

				// Get circumference (2πr)
				circumference = 2 * Math.PI * radius;

				// Get stroke-dashoffset value based on the percentage of the circumference
				strokeDashOffset = circumference - ( ( percent * circumference ) / 100 );

				// Transition progress for 1.25 seconds
				$( this ).find( $( 'circle.complete' ) ).animate({'stroke-dashoffset': strokeDashOffset}, 1250 );
			}
		});
	}).trigger( 'scroll' );

});
