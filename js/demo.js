
/* SCROLLTOP */

// $(window).scroll(function() {
//     var height = $(window).scrollTop();
//     if (height > 100) {
//         $('#back2Top').fadeIn();
//     } else {
//         $('#back2Top').fadeOut();
//     }
// });

// ===================================================
// Audio
// ===================================================

$(function() {

	$(".track").each(function(index, el) {
		init($(this));
	});

	function init(card) {
		card.children(".cover").append('<button class="play"></button><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100"><path id="circle" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M50,2.9L50,2.9C76,2.9,97.1,24,97.1,50v0C97.1,76,76,97.1,50,97.1h0C24,97.1,2.9,76,2.9,50v0C2.9,24,24,2.9,50,2.9z"/></svg>');

		var audio = card.find("audio"),
			play = card.find('.play'),
			circle = card.find('#circle'),
			getCircle = circle.get(0),
			totalLength = getCircle.getTotalLength();

		circle.attr({
				'stroke-dasharray': totalLength,
				'stroke-dashoffset': totalLength
		});

		play.on('click', function() {
			if (audio[0].paused) {
				$("audio").each(function(index, el) {
					$("audio")[index].pause();
				});
				$(".track").removeClass('playing');
				audio[0].play();
				card.addClass('playing');
			} else {
				audio[0].pause();
				card.removeClass('playing');
			}
		});

		audio.on('timeupdate', function() {
			var currentTime = audio[0].currentTime,
				maxduration = audio[0].duration,
				calc = totalLength - ( currentTime / maxduration * totalLength );

			circle.attr('stroke-dashoffset', calc);
		});

		audio.on('ended', function() {
			card.removeClass('playing');
			circle.attr('stroke-dashoffset', totalLength);
		});
		
	}

});

// ===================================================
// To TOP
// ===================================================

$( window ).resize(function() {
  $('body').addClass('scaling');
  setTimeout(function() {
		 $('body').removeClass('scaling');
  }, 300);
});

window.onbeforeunload = function () {
	window.scrollTo(0, 0);
  }

$(document).ready(function() {
    $(".back2Top").click(function(event) {
        event.preventDefault();
        $("html, body, .content").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});

$(document).ready(function() {
    $(".content-top").click(function(event) {
        event.preventDefault();
        $(".content__item").animate({ scrollTop: 0 }, "slow");
        return false;
    });
});

// ===================================================
// Lightbox
// ===================================================

var lightbox = {
  
	config : {
	  gallery              : '.gallery',          // class of gallery
	  galleryImage         : '.image',            // class of image within gallery
	  lightboxID           : '#lightbox',         // id of lighbox to be created
	  lightboxEnabledClass : 'lightbox-enabled',  // class of body when lighbox is enabled
	  buttonsExit          : true,                // include exit div?
	  buttonsNavigation    : true,                // include navigation divs?
	  containImgMargin     : 0                    // margin top and bottom to contain img
	},
	
	init : function(config) {
	  
	  // merge config defaults with init config
	  $.extend(lightbox.config, config);
	  
	  // on click
	  $(lightbox.config.gallery).find('a').on('click', function(event) {
		event.preventDefault();
		lightbox.createLightbox($(this));
	  });
	  
	},
	
	// create lightbox
	createLightbox : function($element) {
	  
	  // add body class
	  $('body').addClass(lightbox.config.lightboxEnabledClass);
  
	  // remove lightbox if exists
	  if ($(lightbox.config.lightboxID).length) { 
		$(lightbox.config.lightboxID).remove(); 
	  }
  
	  // add new lightbox
	  $('body').append('<div id="' + lightbox.config.lightboxID.substring(1) + '"><div class="slider"></div></div>');


  
	  // add exit div if required
	  if (lightbox.config.buttonsExit) {
		$(lightbox.config.lightboxID).append('<div class="exit"></div>');
	  }
  
	  // add navigation divs if required
	  if (lightbox.config.buttonsNavigation) {
		$(lightbox.config.lightboxID).append('<div class="prev"><svg _ngcontent-ahi-c33="" width="26" height="26" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path _ngcontent-ahi-c33="" d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"></path></svg></div><div class="next"><svg _ngcontent-ahi-c33="" width="26" height="26" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path _ngcontent-ahi-c33="" d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"></path></svg></div>');
	  }
	  
	  // now populate lightbox
	  lightbox.populateLightbox($element);
	  
	},
	
	// populate lightbox
	populateLightbox : function($element) {
		
	  var thisgalleryImage = $element.closest(lightbox.config.galleryImage);
	  var thisIndex = thisgalleryImage.index();
  
	  // add slides
	  $element.closest('.gallery').children('.image').each(function() {
		$('#lightbox .slider').append('<div class="slide"><div class="frame"><div class="valign"><img src="' + $(this).find('a').attr('href') + '"></div><div class="caption">' + $(this).find('a').attr('data-caption') + '</div></div></div>');
	  });
	  
	  // now initalise flickity
	  lightbox.initFlickity(thisIndex);
	  
	},
	
	// initalise flickity
	initFlickity : function(thisIndex) {
	  
	  $(lightbox.config.lightboxID).find('.slider').flickity({ // more options: http://flickity.metafizzy.co
		cellAlign: 'left',
		resize: true,
		wrapAround: true,
		prevNextButtons: false,
		pageDots: false,
		initialIndex: thisIndex
	  });
	  
	  // make sure image isn't too tall
	  lightbox.containImg();
	  
	  // on window resize make sure image isn't too tall
	  $(window).on('resize', function() {
		lightbox.containImg();
	  });
	  
	  // buttons
	  var $slider = $(lightbox.config.lightboxID).find('.slider').flickity();
	  
	  $(lightbox.config.lightboxID).find('.exit').on('click', function() {
		$('body').removeClass('lightbox-enabled');

		setTimeout(function() {
		  $slider.flickity('destroy');
		  $(lightbox.config.lightboxID).remove();
		}, 300);
	  });
	  
	  $(lightbox.config.lightboxID).find('.prev').on('click', function() {
		$slider.flickity('previous');
	  });
	  
	  $(lightbox.config.lightboxID).find('.next').on('click', function() {
		$slider.flickity('next');
	  });
	  
	  // keyboard
	  $(document).keyup(function(event) {
		if ($('body').hasClass('lightbox-enabled')) {
		  switch (event.keyCode) {
			case 27:
			  $(lightbox.config.lightboxID).find('.exit').click();
			  break;
			case 37:
			  $(lightbox.config.lightboxID).find('.prev').click();
			  break;
			case 39:
			  $(lightbox.config.lightboxID).find('.next').click();
			  break;
		  }
		}
	  });
	  
	},
	
	// contain lightbox images
	containImg : function() {
	  $(lightbox.config.lightboxID).find('img').css('maxHeight', ($(document).height() - lightbox.config.containImgMargin));
	}
	
  };
  
  // initalise lightbox
  $(document).ready(function() { 
	lightbox.init({
	  containImgMargin : 100
	}); 
  });



$(document).ready(function() {
	var iframe 				= $('#vimeo');
	const player 			= new Vimeo.Player(iframe);
	  
	//   player.on('ended', function() {
	// 	$('body').removeClass('show-reel');
	//   });

	$("#title__unseen").click(function(event) {
		player.setCurrentTime(0);
		player.setVolume(0);
		player.play();
	});

    $("#launch__vimeo").click(function(event) {
        //event.preventDefault();
		$("body").addClass('play__vimeo');
		player.setCurrentTime(0);
		player.setVolume(1);
		//player.play();
		player.setControls(1);
	});
	$("#close__vimeo").click(function(event) {
        event.preventDefault();
		$("body").removeClass('play__vimeo');
		player.setVolume(0);
	});
	$("#launch__youtube").click(function(event) {
        event.preventDefault();
		$("body").addClass('play__youtube');
	});
	$("#close__youtube").click(function(event) {
        event.preventDefault();
        $("body").removeClass('play__youtube');
    });

});


/* HORIZONTAL ACCORDION */

$(function () {
    
    'use strict';
    
    //$('.acc__title').first().addClass('active');
	//$('.acc__content').first().addClass('active');
    
    // Show Info On Click
    
    $('.acc__title').click(function () {
		if ($(window).width() < 1024) {
			$(this).toggleClass('active');
			$(this).next('.acc__content').toggleClass('active');
		} else {
			$(this).addClass("active").siblings('.acc__title').removeClass('active');
			$('.acc__content').removeClass('active');
			$(this).next('.acc__content').addClass('active');
		}
		window.scrollTo({ top: 0, behavior: 'smooth' });
	});
	$('#title__exchange').click(function () {
		setTimeout(function() {
			$('.mono').css('max-height', '100vh');
		}, 300);
	});
	$('#title__unseen').click(function () {
		$('.mono').css('max-height', 'unset');
		// if ($(window).width() > 1023) {
		// 	setTimeout(function() {
		// 		$('.mono').css('max-height', 'auto');
		// 	}, 400);
		// }
	});
    
});

/* SCRAMBLE */
 										   
document.querySelectorAll('.scramble').forEach(element => {
  let interval
  const originalText = element.innerText

  const randomInt = max => Math.floor(Math.random() * max)
  const randomFromArray = array => array[randomInt(array.length)]

  const scrambleText = text => {
	const chars = 'abcdefghijklmnopqrstuvwxyz01234567890#!@£$%^&*+<>'.split('')
	return text
	  .split('')
	  .map(x => randomInt(3) > 1 ? randomFromArray(chars) : x)
	  .join('')
  }
  


  element.addEventListener('mouseover', () => {
	
	interval = setInterval(() =>
		element.innerText = scrambleText(originalText)
	, 100)
	
	 setTimeout(function() {
	  clearInterval( interval )
		element.innerText = originalText
	  }, 800);
	
  })


  element.addEventListener('mouseout', () => {
	clearInterval(interval)
	element.innerText = originalText
  })
});



{
	// Calculates the offsetTop or offsetLeft of an element relative to the viewport 
	// (not counting with any transforms the element might have)
	const getOffset = (elem, axis) => {
		let offset = 0;
		const type = axis === 'top' ? 'offsetTop' : 'offsetLeft';
		do {
			if ( !isNaN( elem[type] ) )
			{
				offset += elem[type];
			}
		} while( elem = elem.offsetParent );
		return offset;
	}
	// Calculates the distance between two points.
	const distance = (p1,p2) => Math.hypot(p2.x-p1.x, p2.y-p1.y);
	// Generates a random number.
	const randNumber = (min,max) => Math.floor(Math.random() * (max - min + 1)) + min;
	// Gets the mouse position. From http://www.quirksmode.org/js/events_properties.html#position
	const getMousePos = (e) => {
		let posx = 0;
		let posy = 0;
		if (!e) e = window.event;
		if (e.pageX || e.pageY) 	{
			posx = e.pageX;
			posy = e.pageY;
		}
		else if (e.clientX || e.clientY) 	{
			posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
			posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
		}
		return { x : posx, y : posy }
	};
	// Returns the rotation angle of an element.
	const getAngle = (el) => {
		const st = window.getComputedStyle(el, null);
		const tr = st.getPropertyValue('transform');
		let values = tr.split('(')[1];
		values = values.split(')')[0];
		values = values.split(',');
		return Math.round(Math.asin(values[1]) * (180/Math.PI));
	};
	// Scroll control functions. Taken from https://stackoverflow.com/a/4770179.
	const keys = {37: 1, 38: 1, 39: 1, 40: 1};
	const preventDefault = (e) => {
		e = e || window.event;
		if (e.preventDefault)
			e.preventDefault();
		e.returnValue = false;  
	}
	const preventDefaultForScrollKeys = (e) => {
		if (keys[e.keyCode]) {
			preventDefault(e);
			return false;
		}
	}
	const disableScroll = () => {
		if (window.addEventListener) // older FF
			window.addEventListener('DOMMouseScroll', preventDefault, false);
		window.onwheel = preventDefault; // modern standard
		window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
		window.ontouchmove  = preventDefault; // mobile
		document.onkeydown  = preventDefaultForScrollKeys;
	}
	const enableScroll = () => {
		if (window.removeEventListener)
			window.removeEventListener('DOMMouseScroll', preventDefault, false);
		window.onmousewheel = document.onmousewheel = null; 
		window.onwheel = null; 
		window.ontouchmove = null;  
		document.onkeydown = null;  
	}
	
	// The GridItem class.
    class GridItem {
        constructor(el) {
			this.DOM = {el: el};
			// The rectangle element around the image.
			this.DOM.bg = this.DOM.el.querySelector('.grid__item-bg');
			// The following DOM elements are elements that will move/tilt when hovering the item.
			this.DOM.tilt = {};
			// The image.
			this.DOM.imgWrap = this.DOM.el.querySelector('.grid__item-wrap');
			this.DOM.tilt.img = this.DOM.imgWrap.querySelector('img');
			// The title (vertical text).
			this.DOM.tilt.title = this.DOM.el.querySelector('.grid__item-title');
			// The number (horizontal letter/number code).
			this.DOM.tilt.number = this.DOM.el.querySelector('.grid__item-number');
			// Split the number into spans using charming.js
			charming(this.DOM.tilt.number);
			// And access the spans/letters.
			this.DOM.numberLetters = this.DOM.tilt.number.querySelectorAll('span');
			// Configuration for when moving/tilting the elements on hover.
			this.tiltconfig = {   
                title: {translation : {x: [-8,8], y: [4,-4]}},
                number: {translation : {x: [-5,5], y: [-10,10]}},
                img: {translation : {x: [-15,15], y: [-10,10]}}
			};
			// Get the rotation angle value of the image element.
			// This will be used to rotate the DOM.bg to the same value when expanding/opening the item.
			this.angle = getAngle(this.DOM.tilt.img);
			// Init/Bind events.
            this.initEvents();
		}
		initEvents() {
			/**
			 * Mouseenter: 
			 * - Scale up the DOM.bg element.
			 * - Animate the number letters.
			 * 
			 * Mousemove: 
			 * - tilt - move both the number, image and title elements. 
			 * 
			 * 
			 * Mouseleave: 
			 * - Scale down the DOM.bg element.
			 * - Animate the number letters.
			 */
			this.toggleAnimationOnHover = (type) => {
				// Scale up the bg element.
				TweenMax.to(this.DOM.bg, 1, {
					ease: Expo.easeOut,
					scale: type === 'mouseenter' ? 1.15 : 1
				});
				// Animate the number letters.
				this.DOM.numberLetters.forEach((letter,pos) => {
					TweenMax.to(letter, .2, {
						ease: Quad.easeIn,
						delay: pos*.1,
						y: type === 'mouseenter' ? '-50%' : '50%',
						opacity: 0,
						onComplete: () => {
							TweenMax.to(letter, type === 'mouseenter' ? 0.6 : 1, {
								ease: type === 'mouseenter' ? Expo.easeOut : Elastic.easeOut.config(1,0.4),
								startAt: {y: type === 'mouseenter' ? '70%' : '-70%', opacity: 0},
								y: '0%',
								opacity: 1
							});
						}
					});
				});
			};
			this.mouseenterFn = (ev) => {
				if ( !allowTilt ) return;
				this.toggleAnimationOnHover(ev.type);
            };
            this.mousemoveFn = (ev) => requestAnimationFrame(() => {
				if ( !allowTilt ) return;
                this.tilt(ev);
            });
            this.mouseleaveFn = (ev) => {
				if ( !allowTilt ) return;
				this.resetTilt();
				this.toggleAnimationOnHover(ev.type);
            };
            this.DOM.el.addEventListener('mouseenter', this.mouseenterFn);
            this.DOM.el.addEventListener('mousemove', this.mousemoveFn);
            this.DOM.el.addEventListener('mouseleave', this.mouseleaveFn);
		}
		tilt(ev) {
			// Get mouse position.
			const mousepos = getMousePos(ev);
            // Document scrolls.
            const docScrolls = {left : body.scrollLeft + docEl.scrollLeft, top : body.scrollTop + docEl.scrollTop};
            const bounds = this.DOM.el.getBoundingClientRect();
            // Mouse position relative to the main element (this.DOM.el).
            const relmousepos = {
                x : mousepos.x - bounds.left - docScrolls.left, 
                y : mousepos.y - bounds.top - docScrolls.top 
            };
            // Movement settings for the tilt elements.
            for (let key in this.DOM.tilt) {
				let t = this.tiltconfig[key].translation;
				// Animate each of the elements..
                TweenMax.to(this.DOM.tilt[key], 2, {
                    ease: Expo.easeOut,
                    x: (t.x[1]-t.x[0])/bounds.width*relmousepos.x + t.x[0],
                    y: (t.y[1]-t.y[0])/bounds.height*relmousepos.y + t.y[0]
                });
            }
		}
		resetTilt() {
			for (let key in this.DOM.tilt ) {
                TweenMax.to(this.DOM.tilt[key], 2, {
					ease: Elastic.easeOut.config(1,0.4),
                    x: 0,
                    y: 0
                });
            }
		}
		/**
		 * Hides the item:
		 * - Scales down and fades out the image and bg elements.
		 * - Moves down and fades out the title and number elements.
		 */
		hide(withAnimation = true) { this.toggle(withAnimation,false); }
		/**
		 * Resets.
		 */
		show(withAnimation = true) { this.toggle(withAnimation); }
		toggle(withAnimation, show = true) {
			TweenMax.to(this.DOM.tilt.img, withAnimation ? 0.8 : 0, {
				ease: Expo.easeInOut,
				delay: !withAnimation ? 0 : show ? 0.15 : 0,
				scale: show ? 1 : 0,
				opacity: show ? 1 : 0,
			});
			TweenMax.to(this.DOM.bg, withAnimation ? 0.8 : 0, {
				ease: Expo.easeInOut,
				delay: !withAnimation ? 0 : show ? 0 : 0.15,
				scale: show ? 1 : 0,
				opacity: show ? 1 : 0
			});
			this.toggleTexts(show ? 0.45 : 0, withAnimation, show);
		}
		// hides the texts (translate down and fade out).
		hideTexts(delay = 0, withAnimation = true) { this.toggleTexts(delay, withAnimation, false); }
		// shows the texts (reset transforms and fade in).
		showTexts(delay = 0, withAnimation = true) { this.toggleTexts(delay, withAnimation); }
		toggleTexts(delay, withAnimation, show = true) {
			TweenMax.to([this.DOM.tilt.title, this.DOM.tilt.number], !withAnimation ? 0 : show ? 1 : 0.5, {
				ease: show ? Expo.easeOut : Quart.easeIn,
				delay: !withAnimation ? 0 : delay,
				y: show ? 0 : 20,
				opacity: show ? 1 : 0
			});
		}
	}

	// The Content class. Represents one content item per grid item.
    class Content {
        constructor(el) {
			this.DOM = {el: el};
			// The content elements: image, title, subtitle and text.
            this.DOM.img = this.DOM.el.querySelector('.content__item-img');
            this.DOM.title = this.DOM.el.querySelector('.content__item-title');
            this.DOM.subtitle = this.DOM.el.querySelector('.content__item-subtitle');
			this.DOM.text = this.DOM.el.querySelector('.content__item-text');
			// Split the title into spans using charming.js
			charming(this.DOM.title);
			// And access the spans/letters.
			this.DOM.titleLetters = this.DOM.title.querySelectorAll('span');
			this.titleLettersTotal = this.DOM.titleLetters.length;
		}
		/**
		 * Show/Hide the content elements (title letters, the subtitle and the text).
		 */
        show(delay = 0, withAnimation = true) { this.toggle(delay, withAnimation); }
        hide(delay = 0, withAnimation = true) { this.toggle(delay, withAnimation, false); }
		toggle(delay, withAnimation, show = true) {
			setTimeout(() => {
				
				this.DOM.titleLetters.forEach((letter,pos) => {
					TweenMax.to(letter, !withAnimation ? 0 : show ? .6 : .3, {
						ease: show ? Back.easeOut : Quart.easeIn,
						delay: !withAnimation ? 0 : show ? pos*.05 : (this.titleLettersTotal-pos-1)*.04,
						startAt: show ? {y: '50%', opacity: 0} : null,
						y: show ? '0%' : '50%',
						opacity: show ? 1 : 0
					});
				});
				this.DOM.subtitle.style.opacity = show ? 1 : 0;
				this.DOM.text.style.opacity = show ? 1 : 0;

			}, withAnimation ? delay*1000 : 0 );
		}
    }

	// The Grid class.
    class Grid {
        constructor(el) {
			this.DOM = {el: el};
			// The grid wrap.
			this.DOM.gridWrap = this.DOM.el.parentNode;
			// The grid items.
            this.items = [];
            Array.from(this.DOM.el.querySelectorAll('.grid__item')).forEach(itemEl => this.items.push(new GridItem(itemEl)));
            // The total number of items.
			this.itemsTotal = this.items.length;
			// The content items.
			this.contents = [];
			Array.from(document.querySelectorAll('.content > .content__item')).forEach(contentEl => this.contents.push(new Content(contentEl)));
			// Back control and scroll indicator (elements shown when the item´s content is open).
			this.DOM.closeCtrl = document.querySelector('.content__close');
			this.DOM.scrollIndicator = document.querySelector('.content__indicator');
			// The open grid item.
			this.current = -1;
            // Init/Bind events.
			this.initEvents();
			
		}
		initEvents() {
			
			// Clicking a grid item hides all the other grid items (ordered by proximity to the clicked one) 
			// and expands/opens the clicked one.
			for (let item of this.items) {
				item.DOM.el.addEventListener('click', (ev) => {
					ev.preventDefault();
					if(item.DOM.el.classList.contains('dummy')) { } else {
						this.openItem(item);
					}
				});
			}
			// Close item.
			this.DOM.closeCtrl.addEventListener('click', () => this.closeItem());
			// (Incomplete! For now: if theres an open item, then show back the grid.
			this.resizeFn = () => {
				if (this.current === -1 || winsize.width === window.innerWidth) return;
				this.closeItem(false);
			};
			window.addEventListener('resize', this.resizeFn);
		}
		getSizePosition(el, scrolls = true) {
			const scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
    		const scrollLeft = window.pageXOffset || docEl.scrollLeft || body.scrollLeft;
			return {
				width: el.offsetWidth,
				height: el.offsetHeight,
				left: scrolls ? getOffset(el, 'left')-scrollLeft : getOffset(el, 'left'),
				top: scrolls ? getOffset(el, 'top')-scrollTop : getOffset(el, 'top')
			};
		}
		openItem(item) {
				if ( this.isAnimating ) return;
				this.isAnimating = true;
				// Get the current scroll position.
				this.scrollPos = window.scrollY;
				// Disable page scrolling.
				disableScroll();
				// Disable tilt.
				allowTilt = false;
				// Set the current value (index of the clicked item).
				this.current = this.items.indexOf(item);
				// Hide all the grid items except the one we want to open.
				this.hideAllItems(item);
				// Also hide the item texts.
				item.hideTexts();
				// Set the item´s z-index to a high value so it overlaps any other grid item.
				item.DOM.el.style.zIndex = 1000;
				// Get the "grid__item-bg" width and height and set it explicitly, 
				// also set its top and left respective to the page.
				const itemDim = this.getSizePosition(item.DOM.el);
				item.DOM.bg.style.width = `${itemDim.width}px`;
				item.DOM.bg.style.height = `${itemDim.height}px`;
				item.DOM.bg.style.left = `${itemDim.left}px`;
				item.DOM.bg.style.top = `${itemDim.top}px`;
				// Set it to position fixed.
				item.DOM.bg.style.position = 'fixed';
				// Calculate the viewport diagonal. We will need to take this in consideration when scaling up the item´s bg element.
				const d = Math.hypot(winsize.width, winsize.height);
				// Scale up the item´s bg element.
				TweenMax.to(item.DOM.bg, 1.2, {
					ease: Expo.easeInOut,
					delay: 0.4,
					x: winsize.width/2 - (itemDim.left+itemDim.width/2),
					y: winsize.height/2 - (itemDim.top+itemDim.height/2),
					scaleX: d/itemDim.width,
					scaleY: d/itemDim.height,
					rotation: -1*item.angle*2
				});
				// Get the content element respective to this grid item.
				const contentEl = this.contents[this.current];
				// Set it to current.
				contentEl.DOM.el.classList.add('content__item--current');
				contentEl.DOM.el.classList.add('content__item--background');
				// Calculate the item´s image and content´s image sizes and positions. 
				// We need this so we can scale up and translate the item´s image to the same size and position of the content´s image.
				const imgDim = this.getSizePosition(item.DOM.imgWrap);
				const contentImgDim = this.getSizePosition(contentEl.DOM.img, false);
				// Show the back control and scroll indicator and all the item´s content elements (1 second delay).
				this.showContentElems(contentEl, 1);
				// Animate the item´s image.
				TweenMax.to(item.DOM.tilt.img, 1.2, {
					ease: Expo.easeInOut,
					delay: 0.55,
					scaleX: contentImgDim.width/imgDim.width,
					scaleY: contentImgDim.height/imgDim.height,
					x: (contentImgDim.left+contentImgDim.width/2)-(imgDim.left+imgDim.width/2),
					y: (contentImgDim.top+contentImgDim.height/2)-(imgDim.top+imgDim.height/2),
					rotation: 0,
					onComplete: () => {
						// Hide the item´s image and show the content´s image. Should both be overlapping.
						item.DOM.tilt.img.style.opacity = 0;
						contentEl.DOM.img.style.visibility = 'visible';
						// Set the main content wrapper to absolute so it´s position at the top.
						contentEl.DOM.el.parentNode.style.position = 'absolute';
						// Hiding the grid scroll.
						this.DOM.gridWrap.classList.add('grid-wrap--hidden');
						// Scroll up the page.
						window.scrollTo(0, 0);
						// Enable page scrolling.
						enableScroll();
						this.isAnimating = false;
					}
				});
		}
		closeItem(withAnimation = true) {
			if ( this.isAnimating ) return;
			this.isAnimating = true;
			// Get the content element respective to this grid item.
			const contentEl = this.contents[this.current];
			// Scroll to the previous scroll position before opening the item.
			window.scrollTo(0, this.scrollPos);
			contentEl.DOM.el.parentNode.style.position = 'fixed';
			// Disable page scrolling.
			disableScroll();
			// Showing the grid scroll.
			this.DOM.gridWrap.classList.remove('grid-wrap--hidden');
			// The item that is open.
			const item = this.items[this.current];
			// Hide the back control and scroll indicator and all the item´s content elements.
			this.hideContentElems(contentEl, 0, withAnimation);
			// Set the grid´s image back to visible and hide the content´s one.
			item.DOM.tilt.img.style.opacity = 1;
			contentEl.DOM.img.style.visibility = 'hidden';
			// Animate the grid´s image back to the grid position.
			TweenMax.to(item.DOM.tilt.img, withAnimation ? 1.2 : 0, {
				ease: Expo.easeInOut,
				scaleX: 1,
				scaleY: 1,
				x: 0,
				y: 0,
				rotation: item.angle*2
			});
			contentEl.DOM.el.classList.remove('content__item--background');
			// And also the bg element.
			TweenMax.to(item.DOM.bg, withAnimation ? 1.2 : 0, {
				ease: Expo.easeInOut,
				delay: 0.15,
				x: 0,
				y: 0,
				scaleX: 1,
				scaleY: 1,
				rotation: 0,
				onComplete: () => {
					contentEl.DOM.el.classList.remove('content__item--current');
					item.DOM.bg.style.position = 'absolute';
					item.DOM.bg.style.left = '0px';
					item.DOM.bg.style.top = '0px';
					this.current = -1;
					allowTilt = true;
					item.DOM.el.style.zIndex = 0;
					enableScroll();
					this.isAnimating = false;
				}
			});
			// Show all the grid items except the one we want to close.
			this.showAllItems(item, withAnimation);
			// Also show the item texts. (1s delay)
			item.showTexts(1, withAnimation);
		}
		/**
		 * Toggle the content elements.
		 */
		showContentElems(contentEl, delay = 0, withAnimation = true) { this.toggleContentElems(contentEl, delay, withAnimation); }
		hideContentElems(contentEl, delay = 0, withAnimation = true) { this.toggleContentElems(contentEl, delay, withAnimation, false); }
		toggleContentElems(contentEl, delay, withAnimation, show = true) {
			// toggle the back control and scroll indicator.
			TweenMax.to([this.DOM.closeCtrl, this.DOM.scrollIndicator], withAnimation ? 0.8 : 0, {
				ease: show ? Expo.easeOut : Expo.easeIn,
				delay: withAnimation ? delay : 0,
				startAt: show ? {y: 60} : null,
				y: show ? 0 : 60,
				opacity: show ? 1 : 0
			});
			if ( show ) {
				contentEl.show(delay, withAnimation);
			}
			else {
				contentEl.hide(delay, withAnimation);
			}
		}
		// Based on https://stackoverflow.com/q/25481717
		sortByDist(refPoint, itemsArray) {
			let distancePairs = [];
			let output = [];
	
			for(let i in itemsArray) {
				const rect = itemsArray[i].DOM.el.getBoundingClientRect();
				distancePairs.push([distance(refPoint,{x:rect.left+rect.width/2, y:rect.top+rect.height/2}), i]);
			}
	
			distancePairs.sort((a,b) => a[0]-b[0]);
	
			for(let p in distancePairs) {
				const pair = distancePairs[p];
				output.push(itemsArray[pair[1]]);
			}
	
			return output;
		}
		/**
		 * Shows/Hides all the grid items except the "exclude" item.
		 * The items will be sorted based on the distance to the exclude item.
		 */
		showAllItems(exclude, withAnimation = true) { this.toggleAllItems(exclude, withAnimation); }
		hideAllItems(exclude, withAnimation = true) { this.toggleAllItems(exclude, withAnimation, false); }
		toggleAllItems(exclude, withAnimation, show = true) {
			if ( !withAnimation ) {
				this.items.filter(item => item != exclude).forEach((item, pos) => item[show ? 'show' : 'hide'](withAnimation));
			}
			else {
				const refrect = exclude.DOM.el.getBoundingClientRect(); 
				const refPoint = {
					x: refrect.left+refrect.width/2, 
					y: refrect.top+refrect.height/2
				};
				this.sortByDist(refPoint, this.items.filter(item => item != exclude))
					.forEach((item, pos) => setTimeout(() => item[show ? 'show' : 'hide'](), show ? 300+pos*70 : pos*70));
			}
		}
	}

	// Controls whether the item will have the "tilt" movement on hover (mousemove) or not.
	let allowTilt = true;
	
	// Caching some stuff..
	const body = document.body;
	const docEl = document.documentElement;
	
	// Window sizes.
    let winsize;
    const calcWinsize = () => winsize = {width: window.innerWidth, height: window.innerHeight};
    calcWinsize();
    window.addEventListener('resize', calcWinsize);

	// Initialize the Grid.
	const grid = new Grid(document.querySelector('.grid'));

	//Preload images.
	imagesLoaded(document.querySelectorAll('.grid__item-img'), () => {
		body.classList.remove('loading');
		var msnry = new Masonry( grid.DOM.el, {
			// options
			itemSelector: '.grid__masonry__item',
			columnWidth: 400,
			gutter: 90,
			fitWidth: false
		});
	});
}


   // ===================================================
   // Function: Carousels
   // ===================================================

   function initCarousels() {

	var options = {
		pageDots: false,
		cellAlign: 'left',
		prevNextButtons: true,
		percentPosition: true,
		wrapAround: false,
		imagesLoaded: false,
		draggable: true,
		groupCells: true,
		autoPlay:false,
		adaptiveHeight: false
	};
	
	// enable prev/next buttons at 768px
	if ( matchMedia('screen and (min-width: 768px)').matches ) {
		options.pageDots    = false;
	 }

	// disable draggable at 1200px
	if ( matchMedia('screen and (min-width: 1025px)').matches ) {
		options.draggable	= false;
	}

	var postElems = document.querySelectorAll('.post-slider');
	for ( var i=0, len = postElems.length; i < len; i++ ) {
	var postElem = postElems[i];
		new Flickity( postElem,options);
	}
	
	var postElems = document.querySelectorAll('.gallery-slider');
	for ( var i=0, len = postElems.length; i < len; i++ ) {
	var postElem = postElems[i];
		new Flickity( postElem, {
			pageDots: false,
			cellAlign: 'left',
			prevNextButtons: true,
			percentPosition: true,
			wrapAround: false,
			imagesLoaded: false,
			draggable: true,
			groupCells: false,
			autoPlay:false,
			adaptiveHeight: false
		});
	}
}

initCarousels();

	// ===================================================
	// WHATS ON Accordions
	// ===================================================


	function whatsonAccordions() {
		var  menu_link = $('.schedule_accordion_head'), sub_menu = $('.schedule_accordion_body');   
		
		menu_link.on('click', function(event) {  
		
		if ($(window).width() < 1024) {
			$(this).toggleClass('mobile-active');
		}
		
		if (!$(this).hasClass('active')) {
			//sub_menu.slideUp(400,'swing');
			sub_menu.addClass('active');
			$(this).next().stop(true,true).slideToggle(400,'swing');
			//menu_link.removeClass('active');
			$(this).addClass('active');
		} 
		else {
			$(this).next().stop(true,true).slideToggle(400,'swing');
			$(this).next().removeClass('active');
			$(this).removeClass('active');
		}
		});
		
	}
whatsonAccordions();