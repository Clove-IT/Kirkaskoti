"use strict";
gsap.registerPlugin(ScrollTrigger, SplitText, ScrollSmoother);
gsap.config({
	nullTargetWarn: false,
	trialWarn: false
});
/*----  Functions  ----*/
function pbmit_img_animation() {
	const boxes = gsap.utils.toArray('.pbmit-animation-style1,.pbmit-animation-style2,.pbmit-animation-style3,.pbmit-animation-style4,.pbmit-animation-style5,.pbmit-animation-style6,.pbmit-animation-style7');
	boxes.forEach(img => {
		gsap.to(img, {
			scrollTrigger: {
				trigger: img,
				start: "top 70%",
				end: "bottom bottom",
				toggleClass: "active",
				once: true,
			}
		});
	});
}
function getpercentage(x, y, elm) {
	elm.find('.pbmit-fid-inner').html(y + '/' + x);
	var cal = Math.round((y * 100) / x);
	return cal;
}
function pbmit_title_animation() {
	ScrollTrigger.matchMedia({
		"(min-width: 1025px)": function() {
			var pbmit_var = jQuery('.pbmit-custom-heading, .pbmit-heading-subheading');
			if (!pbmit_var.length) {
				return;
			}
			const quotes = document.querySelectorAll(".pbmit-custom-heading .pbmit-element-title , .pbmit-heading-subheading .pbmit-element-title");
			quotes.forEach(quote => {
				var getclass = quote.closest('.pbmit-custom-heading ,.pbmit-heading-subheading').className;
				var animation = getclass.split('animation-');
				if (animation[1] == "style4") return
				//Reset if needed
				if (quote.animation) {
					quote.animation.progress(1).kill();
					quote.split.revert();
				}
				quote.split = new SplitText(quote, {
					type: "lines,words,chars",
					linesClass: "split-line"
				});
				gsap.set(quote, { perspective: 400 });
				if (animation[1] == "style1") {
					gsap.set(quote.split.chars, {
						opacity: 0,
						y: "90%",
						rotateX: "-40deg"
					});
				}
				if (animation[1] == "style2") {
					gsap.set(quote.split.chars, {
						opacity: 0,
						x: "50"
					});
				}
				if (animation[1] == "style3") {
					gsap.set(quote.split.chars, {
						opacity: 0,
					});
				}
				quote.animation = gsap.to(quote.split.chars, {
				scrollTrigger: {
					trigger: quote,
					start: "top 90%",
				},
				x: "0",
				y: "0",
				rotateX: "0",
				opacity: 1,
				duration: 1,
				ease: Back.easeOut,
				stagger: .02
				});
			});
		},
	});
}
function pbmit_set_tooltip() {
	jQuery('[data-cursor-tooltip]').each(function() {
		var thisele = jQuery(this);
		var thisele_html = thisele.find('.pbminfotech-box-content').html();
		thisele.attr("data-cursor-tooltip", thisele_html);
	});
}
function pbmit_extend_section() {
	const pbmit_elm = gsap.utils.toArray('.pbmit-extend-animation');
	if (pbmit_elm.length == 0) return	
	ScrollTrigger.matchMedia({
		"(min-width: 1200px)": function() {
			pbmit_elm.forEach(section => {
				let tl = gsap.timeline({
					scrollTrigger: {
						trigger: section,
						start: "top 50%",
						end: "+=400px",
						scrub: 1
					},
					defaults: { ease: "none" }
				});
				tl.fromTo(section, { clipPath: 'inset(0% 5% 0% 5% round 30px)' }, { clipPath: 'inset(0% 0% 0% 0% round 30px)', duration: 1.5 })	
			});			 
		},
		"(max-width:1200px)": function() {
			ScrollTrigger.getAll().forEach(section => section.kill(true));
		}
	});
}
function pbmit_animate_custom_text() {
	jQuery("#js-rotating").Morphext({
		animation: "flipInX",
		speed: 3000,
	});
}

// on ready
jQuery(document).ready(function() {
	pbmit_title_animation();
	pbmit_extend_section();
});
// on resize
jQuery(window).resize(function() {
	pbmit_title_animation();
	pbmit_img_animation();
	pbmit_set_tooltip();
});
// on load
jQuery(window).on('load', function() {
	pbmit_img_animation();
	pbmit_animate_custom_text();
	pbmit_set_tooltip();
	jQuery('[data-magnetic]').each(function() { new Magnetic(this); });
	gsap.delayedCall(1, () =>
		ScrollTrigger.getAll().forEach((t) => {
			t.refresh();
		})
	);
});