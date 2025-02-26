"use strict";
class Magnetic {
	constructor(el, options = {}) {
		this.el = jQuery(el);
		this.options = jQuery.extend(true, {
			y: 0.3,
			x: 0.3,
			s: 0.2,
			rs: 0.7
		}, this.el.data('magnetic') || options);
		this.y = 0;
		this.x = 0;
		this.width = 0;
		this.height = 0;
		if (this.el.data('magnetic-init')) return;
		this.el.data('magnetic-init', true);
		this.bind();
	}
	bind() {
		this.el.on('mouseenter', () => {
			this.y = this.el.offset().top - window.pageYOffset;
			this.x = this.el.offset().left - window.pageXOffset;
			this.width = this.el.outerWidth();
			this.height = this.el.outerHeight();
		});
		this.el.on('mousemove', (e) => {
			const y = (e.clientY - this.y - this.height / 2) * this.options.y;
			const x = (e.clientX - this.x - this.width / 2) * this.options.x;
			this.move(x, y, this.options.s);
		});
		this.el.on('mouseleave', (e) => {
			this.move(0, 0, this.options.rs);
		});
	}
	move(x, y, speed) {
		gsap.to(this.el, {
			y: y,
			x: x,
			force3D: true,
			overwrite: true,
			duration: speed
		});
	}
}