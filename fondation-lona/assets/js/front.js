/**
 * Fondation LONA — interactions front (sans dépendance, ~3 Ko).
 * En-tête au défilement, apparitions discrètes, compteurs, cookies,
 * vidéos après consentement, copie de lien.
 */
( function () {
	'use strict';

	var doc = document.documentElement;
	doc.classList.add( 'lona-js' );
	var reduce = window.matchMedia && window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
	var cfg = window.lonaFront || { i18n: {} };
	var t = cfg.i18n || {};

	/* En-tête : état « défilé » (blanc) */
	var header = document.querySelector( '.site-header' );
	if ( header ) {
		var onScroll = function () {
			header.classList.toggle( 'is-scrolled', window.scrollY > 24 );
		};
		onScroll();
		window.addEventListener( 'scroll', onScroll, { passive: true } );
		// Le menu mobile ouvert doit rester lisible sur le Hero.
		header.addEventListener( 'click', function ( e ) {
			if ( e.target.closest( '.wp-block-navigation__responsive-container-open' ) ) {
				header.classList.add( 'is-scrolled' );
			}
		} );
	}

	/* Apparitions et compteurs */
	var counters = document.querySelectorAll( '.lona-counter' );
	var animateCounter = function ( el ) {
		var target = parseFloat( el.getAttribute( 'data-target' ) );
		if ( isNaN( target ) || reduce ) {
			return;
		}
		var decimals = target % 1 === 0 ? 0 : 1;
		var fmt = new Intl.NumberFormat( doc.lang || 'fr', { minimumFractionDigits: decimals, maximumFractionDigits: decimals } );
		var start = null;
		var duration = 2600;
		var step = function ( ts ) {
			if ( ! start ) {
				start = ts;
			}
			var p = Math.min( ( ts - start ) / duration, 1 );
			el.textContent = fmt.format( target * ( 1 - Math.pow( 1 - p, 3 ) ) );
			if ( p < 1 ) {
				requestAnimationFrame( step );
			}
		};
		requestAnimationFrame( step );
	};

	if ( 'IntersectionObserver' in window ) {
		var io = new IntersectionObserver( function ( entries ) {
			entries.forEach( function ( entry ) {
				if ( ! entry.isIntersecting ) {
					return;
				}
				entry.target.classList.add( 'is-visible' );
				if ( entry.target.classList.contains( 'lona-counter' ) ) {
					animateCounter( entry.target );
				}
				io.unobserve( entry.target );
			} );
		}, { rootMargin: '0px 0px -8% 0px', threshold: 0.12 } );
		document.querySelectorAll( '.reveal' ).forEach( function ( el, i ) {
			el.style.transitionDelay = ( i % 4 ) * 140 + 'ms';
			io.observe( el );
		} );
		counters.forEach( function ( el ) {
			io.observe( el );
		} );
	} else {
		document.querySelectorAll( '.reveal' ).forEach( function ( el ) {
			el.classList.add( 'is-visible' );
		} );
	}

	/* Consentement cookies */
	var COOKIE = 'lona_consent';
	var getConsent = function () {
		var m = document.cookie.match( /(?:^|; )lona_consent=([^;]*)/ );
		return m ? m[ 1 ] : '';
	};
	var setConsent = function ( value ) {
		document.cookie = COOKIE + '=' + value + ';path=/;max-age=' + 60 * 60 * 24 * 180 + ';SameSite=Lax' + ( location.protocol === 'https:' ? ';Secure' : '' );
		document.dispatchEvent( new CustomEvent( 'lona:consent', { detail: value } ) );
	};

	var loadEmbed = function ( box ) {
		var frame = box.querySelector( 'iframe[data-lona-src]' );
		if ( frame && ! frame.src ) {
			frame.src = frame.getAttribute( 'data-lona-src' );
		}
		box.classList.add( 'is-loaded' );
	};
	var loadAllEmbeds = function () {
		document.querySelectorAll( '.lona-embed-consent' ).forEach( loadEmbed );
	};
	document.addEventListener( 'click', function ( e ) {
		var btn = e.target.closest( '.lona-embed-consent__btn' );
		if ( btn ) {
			loadEmbed( btn.closest( '.lona-embed-consent' ) );
			var frame = btn.closest( '.lona-embed-consent' ).querySelector( 'iframe' );
			if ( frame ) {
				frame.focus();
			}
		}
	} );

	var banner;
	var showBanner = function () {
		if ( banner ) {
			banner.querySelector( 'button' ).focus();
			return;
		}
		banner = document.createElement( 'div' );
		banner.className = 'lona-cookies';
		banner.setAttribute( 'role', 'dialog' );
		banner.setAttribute( 'aria-live', 'polite' );
		banner.setAttribute( 'aria-label', t.cookieLabel || 'Cookies' );
		var p = document.createElement( 'p' );
		p.textContent = t.cookieText || '';
		var actions = document.createElement( 'div' );
		actions.className = 'lona-cookies__actions';
		var accept = document.createElement( 'button' );
		accept.type = 'button';
		accept.className = 'is-accept';
		accept.textContent = t.accept || 'OK';
		var refuse = document.createElement( 'button' );
		refuse.type = 'button';
		refuse.className = 'is-refuse';
		refuse.textContent = t.refuse || 'Non';
		actions.appendChild( accept );
		actions.appendChild( refuse );
		if ( cfg.privacyUrl ) {
			var more = document.createElement( 'a' );
			more.href = cfg.privacyUrl;
			more.textContent = t.learnMore || '';
			actions.appendChild( more );
		}
		banner.appendChild( p );
		banner.appendChild( actions );
		document.body.appendChild( banner );
		var close = function ( value ) {
			setConsent( value );
			if ( value === 'all' ) {
				loadAllEmbeds();
			}
			banner.remove();
			banner = null;
		};
		accept.addEventListener( 'click', function () {
			close( 'all' );
		} );
		refuse.addEventListener( 'click', function () {
			close( 'essential' );
		} );
	};

	var consent = getConsent();
	if ( consent === 'all' ) {
		loadAllEmbeds();
	} else if ( ! consent ) {
		window.addEventListener( 'load', function () {
			setTimeout( showBanner, 600 );
		} );
	}
	document.addEventListener( 'click', function ( e ) {
		var link = e.target.closest( '[data-lona-cookies]' );
		if ( link ) {
			e.preventDefault();
			showBanner();
		}
	} );
	window.lonaConsent = { get: getConsent, open: showBanner };

	/* Copie du lien (partage) */
	document.addEventListener( 'click', function ( e ) {
		var btn = e.target.closest( '.lona-share__copy' );
		if ( ! btn || ! navigator.clipboard ) {
			return;
		}
		navigator.clipboard.writeText( btn.getAttribute( 'data-url' ) ).then( function () {
			btn.classList.add( 'is-copied' );
			btn.setAttribute( 'aria-label', t.copied || 'OK' );
			setTimeout( function () {
				btn.classList.remove( 'is-copied' );
				btn.removeAttribute( 'aria-label' );
			}, 2000 );
		} );
	} );

	/* Formulaires : focus sur le message de retour */
	var notice = document.querySelector( '.lona-form__notice' );
	if ( notice ) {
		notice.focus();
	}
} )();

/* Méga-menu et menu mobile (bloc lona/site-header) */
( function () {
	'use strict';
	var header = document.querySelector( '[data-lona-header]' );
	if ( ! header ) {
		return;
	}
	var triggers = header.querySelectorAll( '.lona-mega__trigger[aria-controls]' );
	var burger = header.querySelector( '.lona-burger' );
	var mobile = document.getElementById( 'lona-mobile-menu' );

	var setOpen = function ( btn, open ) {
		var panel = document.getElementById( btn.getAttribute( 'aria-controls' ) );
		btn.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
		if ( panel ) {
			panel.hidden = ! open;
		}
	};
	var closeAll = function ( except ) {
		triggers.forEach( function ( t ) {
			if ( t !== except ) {
				setOpen( t, false );
			}
		} );
	};
	triggers.forEach( function ( btn ) {
		btn.addEventListener( 'click', function () {
			var open = btn.getAttribute( 'aria-expanded' ) !== 'true';
			closeAll( btn );
			setOpen( btn, open );
		} );
		btn.parentElement.addEventListener( 'keydown', function ( e ) {
			if ( e.key === 'Escape' && btn.getAttribute( 'aria-expanded' ) === 'true' ) {
				setOpen( btn, false );
				btn.focus();
			}
		} );
	} );

	var setMobile = function ( open ) {
		if ( ! burger || ! mobile ) {
			return;
		}
		burger.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
		burger.querySelector( '.screen-reader-text' ).textContent = open ? 'Fermer le menu' : 'Ouvrir le menu';
		mobile.hidden = ! open;
		document.documentElement.classList.toggle( 'lona-menu-open', open );
	};
	if ( burger ) {
		burger.addEventListener( 'click', function () {
			setMobile( burger.getAttribute( 'aria-expanded' ) !== 'true' );
		} );
	}
	header.querySelectorAll( '.lona-mobile__toggle' ).forEach( function ( btn ) {
		btn.addEventListener( 'click', function () {
			var open = btn.getAttribute( 'aria-expanded' ) !== 'true';
			btn.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
			document.getElementById( btn.getAttribute( 'aria-controls' ) ).hidden = ! open;
		} );
	} );

	document.addEventListener( 'click', function ( e ) {
		if ( ! header.contains( e.target ) ) {
			closeAll();
			setMobile( false );
		}
	} );
	document.addEventListener( 'keydown', function ( e ) {
		if ( e.key === 'Escape' ) {
			closeAll();
			if ( burger && burger.getAttribute( 'aria-expanded' ) === 'true' ) {
				setMobile( false );
				burger.focus();
			}
		}
	} );
	window.addEventListener( 'resize', function () {
		if ( window.innerWidth >= 1024 ) {
			setMobile( false );
		} else {
			closeAll();
		}
	} );
} )();

/* Animations : apparitions en cascade, titre mot par mot, parallaxe, en-tête compact */
( function () {
	'use strict';
	var reduce = window.matchMedia && window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	/* En-tête compact (indépendant des préférences : simple changement de taille) */
	var siteHeader = document.querySelector( '.site-header' );
	if ( siteHeader ) {
		var onScroll = function () {
			siteHeader.classList.toggle( 'is-compact', window.scrollY > 120 );
		};
		onScroll();
		window.addEventListener( 'scroll', onScroll, { passive: true } );
	}
	if ( reduce || ! ( 'IntersectionObserver' in window ) ) {
		return;
	}

	/* 1. Titre du Hero mot par mot (le texte reste lisible par les lecteurs d'écran) */
	var title = document.querySelector( '.lona-hero__title' );
	if ( title && ! title.dataset.split ) {
		title.dataset.split = '1';
		title.setAttribute( 'aria-label', title.textContent.replace( /\s+/g, ' ' ).trim() );
		var w = 0;
		var wrap = function ( node ) {
			Array.prototype.slice.call( node.childNodes ).forEach( function ( child ) {
				if ( child.nodeType === 3 ) {
					var frag = document.createDocumentFragment();
					child.textContent.split( /(\s+)/ ).forEach( function ( part ) {
						if ( ! part ) {
							return;
						}
						if ( /^\s+$/.test( part ) ) {
							frag.appendChild( document.createTextNode( ' ' ) );
							return;
						}
						var span = document.createElement( 'span' );
						span.className = 'lona-word';
						span.setAttribute( 'aria-hidden', 'true' );
						span.style.setProperty( '--w', w++ );
						span.textContent = part;
						frag.appendChild( span );
					} );
					child.parentNode.replaceChild( frag, child );
				} else if ( child.nodeType === 1 ) {
					wrap( child );
				}
			} );
		};
		wrap( title );
	}

	/* 2. Apparitions au défilement (ajoutées automatiquement aux composants) */
	var groups = [
		[ '.lona-section__head, .lona-section__intro, .lona-page-hero > *:not(.lona-breadcrumbs)', '' ],
		[ '.lona-split > .wp-block-column:first-child', 'left' ],
		[ '.lona-split > .wp-block-column:last-child', 'right' ],
		[ '.lona-domain, .lona-news__list > li, .lona-engage__item, .lona-timeline__item, .lona-president__facts li, .lona-stat, .lona-partner, .lona-event, .lona-member, .lona-testimonial, .lona-program, .lona-project, .lona-values > .wp-block-column, .lona-vision > .wp-block-column, .site-footer__cols > .wp-block-column', '' ],
		[ '.lona-content > .wp-block-image, .lona-article__image, .lona-gallery figure', 'img' ],
	];
	var targets = [];
	groups.forEach( function ( g ) {
		document.querySelectorAll( g[ 0 ] ).forEach( function ( el ) {
			if ( el.classList.contains( 'lona-anim' ) || el.closest( '.lona-hero, .lona-header' ) ) {
				return;
			}
			el.classList.remove( 'reveal' );
			el.classList.add( 'lona-anim' );
			if ( g[ 1 ] ) {
				el.classList.add( 'lona-anim--' + g[ 1 ] );
			}
			var siblings = el.parentElement ? Array.prototype.indexOf.call( el.parentElement.children, el ) : 0;
			el.style.setProperty( '--lona-i', Math.min( siblings, 6 ) );
			targets.push( el );
		} );
	} );
	var io = new IntersectionObserver( function ( entries ) {
		entries.forEach( function ( entry ) {
			if ( entry.isIntersecting ) {
				entry.target.classList.add( 'is-in' );
				io.unobserve( entry.target );
			}
		} );
	}, { rootMargin: '0px 0px -10% 0px', threshold: 0.08 } );
	targets.forEach( function ( el ) {
		// Éléments déjà visibles au chargement : affichés sans attendre.
		var r = el.getBoundingClientRect();
		if ( r.top < window.innerHeight * 0.9 && r.bottom > 0 ) {
			requestAnimationFrame( function () {
				el.classList.add( 'is-in' );
			} );
		} else {
			io.observe( el );
		}
	} );

	/* 3. Parallaxe douce des grandes photos (écrans larges uniquement) */
	var layers = Array.prototype.slice.call( document.querySelectorAll( '.lona-hero .wp-block-cover__image-background, .lona-build .wp-block-cover__image-background' ) );
	if ( layers.length && window.innerWidth > 782 ) {
		layers.forEach( function ( l ) {
			l.classList.add( 'lona-parallax' );
		} );
		var ticking = false;
		var update = function () {
			layers.forEach( function ( l ) {
				var box = l.parentElement.getBoundingClientRect();
				if ( box.bottom < 0 || box.top > window.innerHeight ) {
					return;
				}
				var progress = ( box.top + box.height / 2 - window.innerHeight / 2 ) / window.innerHeight;
				l.style.setProperty( '--lona-py', ( progress * -60 ).toFixed( 1 ) + 'px' );
			} );
			ticking = false;
		};
		window.addEventListener( 'scroll', function () {
			if ( ! ticking ) {
				ticking = true;
				requestAnimationFrame( update );
			}
		}, { passive: true } );
		update();
	}
} )();
