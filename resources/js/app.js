import './bootstrap';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

document.addEventListener('DOMContentLoaded', () => {
	document.querySelectorAll('.js-swiper').forEach((el) => {
		new Swiper(el, {
			loop: true,
			autoplay: { delay: 4000, disableOnInteraction: false },
			pagination: { el: el.querySelector('.swiper-pagination'), clickable: true },
			navigation: { nextEl: el.querySelector('.swiper-button-next'), prevEl: el.querySelector('.swiper-button-prev') },
			slidesPerView: 1,
		});
	});
	// Mobile nav toggle (hamburger) with off-canvas and overlay
	const navToggle = document.getElementById('nav-toggle');
	const navList = document.getElementById('nav-list');
	const navOverlay = document.getElementById('nav-overlay');
	if (navToggle && navList) {
		const openMenu = () => {
			navToggle.setAttribute('aria-expanded', 'true');
			navList.classList.remove('-translate-x-full');
			if (navOverlay) {
				navOverlay.classList.remove('opacity-0', 'pointer-events-none');
				navOverlay.classList.add('opacity-100', 'pointer-events-auto');
			}
			const openIcon = document.getElementById('icon-open');
			const closeIcon = document.getElementById('icon-close');
			if (openIcon && closeIcon) { openIcon.classList.add('hidden'); closeIcon.classList.remove('hidden'); }
		};
		const closeMenu = () => {
			navToggle.setAttribute('aria-expanded', 'false');
			navList.classList.add('-translate-x-full');
			if (navOverlay) {
				navOverlay.classList.add('opacity-0', 'pointer-events-none');
				navOverlay.classList.remove('opacity-100', 'pointer-events-auto');
			}
			const openIcon = document.getElementById('icon-open');
			const closeIcon = document.getElementById('icon-close');
			if (openIcon && closeIcon) { openIcon.classList.remove('hidden'); closeIcon.classList.add('hidden'); }
		};

		navToggle.addEventListener('click', () => {
			const expanded = navToggle.getAttribute('aria-expanded') === 'true';
			if (expanded) closeMenu(); else openMenu();
		});

		if (navOverlay) {
			navOverlay.addEventListener('click', () => closeMenu());
		}

		// close on escape
		document.addEventListener('keydown', (e) => {
			if (e.key === 'Escape') closeMenu();
		});
	}
});
