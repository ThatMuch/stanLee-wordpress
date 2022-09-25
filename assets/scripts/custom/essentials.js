/* eslint-disable no-undef */
/* eslint-disable no-unused-vars */
/*!
 * Essential javascript functions/variables
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0.0
 *
 */

/*==================================================================================
  General Variables & Presets
==================================================================================*/


/* Viewport Width
/––––––––––––––––––––––––*/
var $vpWidth = jQuery( window ).width();

/* Touch Device
/––––––––––––––––––––––––*/
var $root = $( 'html' );
var isTouch = 'ontouchstart' in document.documentElement;
if ( isTouch ) {
	$root.attr( 'data-touch', 'true' );
} else {
	$root.attr( 'data-touch', 'false' );
}


/* Debouncer
/––––––––––––––––––––––––*/
// prevents functions to execute to often/fast
// Usage:
// var myfunction = debounce(function() {
//   // function stuff
// }, 250);
// window.addEventListener('resize', myfunction);
function debouncer( func, wait, immediate ) {
	var timeout;
	return function() {
		var context = this,
			args = arguments;
		var later = function() {
			timeout = null;
			if ( ! immediate ) {
				func.apply( context, args );
			}
		};
		var callNow = immediate && ! timeout;
		clearTimeout( timeout );
		timeout = setTimeout( later, wait );
		if ( callNow ) {
			func.apply( context, args );
		}
	};
}

$('.burger').click(function () {
	$(this).toggleClass('active');
	$('.navbar-collapse').toggleClass('active')
	return false;
});

// Carrousel

const $carrousel = $('#carrousel');
const $images = $('#carrousel li');
var $compt = 0;


function changeBubbleColor(a) {
	a.css({
		backgroundColor: '#839499',
		transform: 'scale(1)'
	})
	a.eq($compt).css({
		backgroundColor: '#1B2A2F',
		transform: 'scale(1.3)'
	})
}

function switchImages() {
	var $currentImg = $images.eq($compt);
	$images.fadeOut(500);
	$currentImg.fadeIn(500);
}
switchImages();

const $prevBtn = $('.prevBtn');
const $nextBtn = $('.nextBtn');

$prevBtn.on('click',function () {
	if ($compt <= 0) {
		$compt = $images.length - 1;
	} else {
		$compt--;
	}
	switchImages();
	changeBubbleColor($bubbles);

})

$nextBtn.on('click',function () {
	if ($compt >= $images.length - 1) {
		$compt = 0;
	} else {
		$compt++;
	}
	switchImages();
	changeBubbleColor($bubbles);
})

// Fonction diporama qui change l'image automatiquement toute les 10 secondes
function slideShow() {
	setTimeout(function () {
		if ($compt >= $images.length - 1) {
			$compt = 0;
		} else {
			$compt++;
		}
		switchImages();
		changeBubbleColor($bubbles);

		slideShow(); // relance la fonction
	},10000);
}

slideShow(); // on oublie pas de lancer la fonction une première fois

// Pour chaque image, crée une bulle correspondante en dessous
$images.each(function () {
	$('.bubbles').append(`<li><a data-target="#"></a></li>`);
})

const $bubbles = $('.bubbles a');
// Changement dynamique des images lors des clics sur les bulles
$bubbles.each(function () {
	$(this).on('click',function () {
		// Si l'index de la bulle est déjà égal au compteur, alors n'éxécute pas la fonction
		if ($bubbles.index($(this)) == $compt) {
			return false
		}
		// Le compteur prend la valeur de l'index du lien (bulle) dans le tableau $bubbles
		$compt = $bubbles.index($(this));

		switchImages();
		changeBubbleColor($bubbles);
	})
})

changeBubbleColor($bubbles);

// FAQ

const faqs = document.querySelectorAll(".accordion__item__header");

function toggleAccordion() {
	const itemToggle = this.getAttribute('aria-expanded');

	for (var i = 0; i < faqs.length; i++) {
		faqs[i].setAttribute('aria-expanded','false');
	}

	if (itemToggle == 'false') {
		this.setAttribute('aria-expanded','true');
	}
}

faqs.forEach(item => item.addEventListener('click',toggleAccordion));
