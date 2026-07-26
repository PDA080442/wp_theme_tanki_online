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

	function setMenuExpanded(expanded) {
		if (!menuToggle) {
			return;
		}
		menuToggle.setAttribute('aria-expanded', expanded ? 'true' : 'false');
		var openLabel = menuToggle.getAttribute('data-label-open') || 'Открыть меню';
		var closeLabel = menuToggle.getAttribute('data-label-close') || 'Закрыть меню';
		menuToggle.setAttribute('aria-label', expanded ? closeLabel : openLabel);
	}

	function closeMenu() {
		if (!header) {
			return;
		}
		header.classList.remove('is-menu-open');
		document.documentElement.classList.remove('is-menu-open');
		document.body.classList.remove('is-menu-open');
		setMenuExpanded(false);
	}

	function openMenu() {
		if (!header) {
			return;
		}
		header.classList.add('is-menu-open');
		document.documentElement.classList.add('is-menu-open');
		document.body.classList.add('is-menu-open');
		setMenuExpanded(true);
	}

	if (header && menuToggle) {
		menuToggle.addEventListener('click', function () {
			if (header.classList.contains('is-menu-open')) {
				closeMenu();
			} else {
				openMenu();
			}
		});

		document.addEventListener('click', function (event) {
			if (!header.contains(event.target)) {
				closeMenu();
			}
		});

		header.addEventListener('click', function (event) {
			var link = event.target.closest('a');
			if (!link || !header.contains(link)) {
				return;
			}

			var href = link.getAttribute('href');
			if (href === '#' || href === '') {
				event.preventDefault();
			}

			if (window.matchMedia('(max-width: 900px)').matches && header.classList.contains('is-menu-open')) {
				closeMenu();
			}
		});

		if (externalNav && nav) {
			externalNav.setAttribute('data-mobile-panel', 'true');
		}
	}

	/* —— Search overlay —— */
	var popup = document.getElementById('tanki-search-popup');
	var openBtn = document.getElementById('tanki-open-search');
	var closeBtn = document.getElementById('tanki-search-close');
	var form = document.getElementById('tanki-search-form');
	var field = document.getElementById('tanki-search-field');
	var results = document.getElementById('tanki-search-results');
	var orderInput = document.getElementById('tanki-search-order');
	var typeInput = document.getElementById('tanki-search-type');
	var orderToggle = document.getElementById('tanki-search-order-toggle');
	var orderMenu = document.getElementById('tanki-search-order-menu');
	var cfg = window.tankiSearch || {};
	var debounceTimer = null;
	var activeRequest = 0;

	function isSearchOpen() {
		return document.documentElement.classList.contains('is-search-open');
	}

	function openSearch() {
		if (!popup) {
			return;
		}
		popup.hidden = false;
		popup.setAttribute('aria-hidden', 'false');
		document.documentElement.classList.add('is-search-open');
		document.body.classList.add('is-search-open');
		if (openBtn) {
			openBtn.setAttribute('aria-expanded', 'true');
		}
		closeMenu();
		if (field) {
			window.setTimeout(function () {
				field.focus();
				field.select();
			}, 10);
		}
		runSearch();
	}

	function closeSearch() {
		if (!popup) {
			return;
		}
		popup.hidden = true;
		popup.setAttribute('aria-hidden', 'true');
		document.documentElement.classList.remove('is-search-open');
		document.body.classList.remove('is-search-open');
		if (openBtn) {
			openBtn.setAttribute('aria-expanded', 'false');
			openBtn.focus();
		}
		if (orderMenu) {
			orderMenu.hidden = true;
		}
	}

	function setOrder(order) {
		var next = order === 'ASC' ? 'ASC' : 'DESC';
		if (orderInput) {
			orderInput.value = next;
		}
		if (orderToggle && cfg.i18n) {
			orderToggle.textContent = next === 'ASC' ? cfg.i18n.oldest : cfg.i18n.newest;
		}
		if (orderMenu) {
			orderMenu.hidden = true;
		}
		runSearch();
	}

	function setType(type) {
		var next = type || 'all';
		if (typeInput) {
			typeInput.value = next;
		}
		Array.prototype.forEach.call(document.querySelectorAll('.search-popup__type'), function (btn) {
			btn.classList.toggle('is-active', btn.getAttribute('data-news-type') === next);
		});
		runSearch();
	}

	function runSearch() {
		if (!results || !cfg.ajaxUrl) {
			return;
		}

		var query = field ? field.value.trim() : '';
		if (!query) {
			results.innerHTML = cfg.i18n && cfg.i18n.empty
				? '<p class="search-popup__empty">' + cfg.i18n.empty + '</p>'
				: '';
			return;
		}

		var requestId = ++activeRequest;
		results.classList.add('is-loading');

		var params = new URLSearchParams({
			action: 'tanki_search',
			s: query,
			order: orderInput ? orderInput.value : 'DESC',
			news_type: typeInput ? typeInput.value : 'all'
		});

		fetch(cfg.ajaxUrl + '?' + params.toString(), {
			credentials: 'same-origin',
			headers: { Accept: 'application/json' }
		})
			.then(function (response) {
				return response.json();
			})
			.then(function (payload) {
				if (requestId !== activeRequest) {
					return;
				}
				results.classList.remove('is-loading');
				if (payload && payload.success && payload.data) {
					results.innerHTML = payload.data.html || (
						cfg.i18n && cfg.i18n.nothing
							? '<p class="search-popup__empty">' + cfg.i18n.nothing + '</p>'
							: ''
					);
				}
			})
			.catch(function () {
				if (requestId !== activeRequest) {
					return;
				}
				results.classList.remove('is-loading');
			});
	}

	function scheduleSearch() {
		window.clearTimeout(debounceTimer);
		debounceTimer = window.setTimeout(runSearch, 280);
	}

	if (openBtn) {
		openBtn.addEventListener('click', openSearch);
	}

	if (closeBtn) {
		closeBtn.addEventListener('click', closeSearch);
	}

	if (popup) {
		popup.addEventListener('click', function (event) {
			if (event.target === popup) {
				closeSearch();
			}
		});
	}

	if (field) {
		field.addEventListener('input', scheduleSearch);
	}

	if (form) {
		form.addEventListener('submit', function (event) {
			event.preventDefault();
			runSearch();
		});
	}

	if (orderToggle && orderMenu) {
		orderToggle.addEventListener('click', function () {
			orderMenu.hidden = !orderMenu.hidden;
		});
		orderMenu.addEventListener('click', function (event) {
			var btn = event.target.closest('[data-order]');
			if (btn) {
				setOrder(btn.getAttribute('data-order'));
			}
		});
	}

	Array.prototype.forEach.call(document.querySelectorAll('.search-popup__type'), function (btn) {
		btn.addEventListener('click', function () {
			setType(btn.getAttribute('data-news-type'));
		});
	});

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape') {
			if (isSearchOpen()) {
				closeSearch();
			} else {
				closeMenu();
			}
		}
	});

	var autoSearch = document.querySelector('[data-tanki-auto-search="1"]');
	if (autoSearch) {
		openSearch();
	}
})();
