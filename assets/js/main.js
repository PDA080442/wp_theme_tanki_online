/**
 * Tanki Online News — main script (vanilla JS, no jQuery).
 */
(function () {
	'use strict';

	document.documentElement.classList.add('js');

	var header = document.getElementById('site-header');
	var menuToggle = document.getElementById('site-menu-toggle');
	var nav = document.getElementById('site-nav');
	var externalNav = header ? header.querySelector('.site-nav--external') : null;

	if (!header || !menuToggle) {
		return;
	}

	function setExpanded(expanded) {
		menuToggle.setAttribute('aria-expanded', expanded ? 'true' : 'false');
	}

	function closeMenu() {
		header.classList.remove('is-menu-open');
		setExpanded(false);
	}

	menuToggle.addEventListener('click', function () {
		var open = !header.classList.contains('is-menu-open');
		header.classList.toggle('is-menu-open', open);
		setExpanded(open);
	});

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape') {
			closeMenu();
		}
	});

	document.addEventListener('click', function (event) {
		if (!header.contains(event.target)) {
			closeMenu();
		}
	});

	// Keep external links in the mobile drawer with primary nav.
	if (externalNav && nav) {
		externalNav.setAttribute('data-mobile-panel', 'true');
	}
})();
