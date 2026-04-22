/**
 * Template Name: iPortfolio
 * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
 * Updated: Jun 29 2024 with Bootstrap v5.3.3
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */

(function () {
	"use strict";

	/**
	 * Header toggle
	 */
	const headerToggleBtn = document.querySelector(".header-toggle");

	function headerToggle() {
		document.querySelector("#header").classList.toggle("header-show");
		headerToggleBtn.classList.toggle("bi-list");
		headerToggleBtn.classList.toggle("bi-x");
	}
	headerToggleBtn.addEventListener("click", headerToggle);

	/**
	 * Hide mobile nav on same-page/hash links
	 */
	document.querySelectorAll("#navmenu a").forEach((navmenu) => {
		navmenu.addEventListener("click", () => {
			if (document.querySelector(".header-show")) {
				headerToggle();
			}
		});
	});

	/**
	 * Toggle mobile nav dropdowns
	 */
	document.querySelectorAll(".navmenu .toggle-dropdown").forEach((navmenu) => {
		navmenu.addEventListener("click", function (e) {
			e.preventDefault();
			this.parentNode.classList.toggle("active");
			this.parentNode.nextElementSibling.classList.toggle("dropdown-active");
			e.stopImmediatePropagation();
		});
	});

	/**
	 * Preloader
	 */
	const preloader = document.querySelector("#preloader");
	if (preloader) {
		window.addEventListener("load", () => {
			preloader.remove();
		});
	}

	/**
	 * Scroll top button
	 */
	let scrollTop = document.querySelector(".scroll-top");

	function toggleScrollTop() {
		if (scrollTop) {
			window.scrollY > 100
				? scrollTop.classList.add("active")
				: scrollTop.classList.remove("active");
		}
	}
	scrollTop.addEventListener("click", (e) => {
		e.preventDefault();
		window.scrollTo({
			top: 0,
			behavior: "smooth",
		});
	});

	window.addEventListener("load", toggleScrollTop);
	document.addEventListener("scroll", toggleScrollTop);

	/**
	 * Animation on scroll function and init
	 */
	function aosInit() {
		AOS.init({
			duration: 600,
			easing: "ease-in-out",
			once: true,
			mirror: false,
		});
	}
	window.addEventListener("load", aosInit);

	/**
	 * Init typed.js
	 */
	const selectTyped = document.querySelector(".typed");
	if (selectTyped) {
		let typed_strings = selectTyped.getAttribute("data-typed-items");
		typed_strings = typed_strings.split(",");
		new Typed(".typed", {
			strings: typed_strings,
			loop: true,
			typeSpeed: 100,
			backSpeed: 50,
			backDelay: 2000,
		});
	}

	/**
	 * Initiate Pure Counter
	 */
	new PureCounter();

	/**
	 * Animate the skills items on reveal
	 */
	let skillsAnimation = document.querySelectorAll(".skills-animation");
	skillsAnimation.forEach((item) => {
		new Waypoint({
			element: item,
			offset: "80%",
			handler: function (direction) {
				let progress = item.querySelectorAll(".progress .progress-bar");
				progress.forEach((el) => {
					el.style.width = el.getAttribute("aria-valuenow") + "%";
				});
			},
		});
	});

	/**
	 * Initiate glightbox
	 */
	const glightbox = GLightbox({
		selector: ".glightbox",
	});

	/**
	 * Init isotope layout and filters
	 */
	document.querySelectorAll(".isotope-layout").forEach(function (isotopeItem) {
		let layout = isotopeItem.getAttribute("data-layout") ?? "masonry";
		let filter = isotopeItem.getAttribute("data-default-filter") ?? "*";
		let sort = isotopeItem.getAttribute("data-sort") ?? "original-order";

		let initIsotope;
		imagesLoaded(isotopeItem.querySelector(".isotope-container"), function () {
			initIsotope = new Isotope(
				isotopeItem.querySelector(".isotope-container"),
				{
					itemSelector: ".isotope-item",
					layoutMode: layout,
					filter: filter,
					sortBy: sort,
				}
			);
		});

		isotopeItem
			.querySelectorAll(".isotope-filters li")
			.forEach(function (filters) {
				filters.addEventListener(
					"click",
					function () {
						isotopeItem
							.querySelector(".isotope-filters .filter-active")
							.classList.remove("filter-active");
						this.classList.add("filter-active");
						initIsotope.arrange({
							filter: this.getAttribute("data-filter"),
						});
						if (typeof aosInit === "function") {
							aosInit();
						}
					},
					false
				);
			});

		/**
		 * Search functionality
		 */
		const searchInput = document.getElementById("searchInput");
		const cardColumns = document.getElementsByClassName("portfolio-item");
		const cardContainer = document.getElementById("linkContainer");

		searchInput.addEventListener("input", function (e) {
			const searchTerm = e.target.value.toLowerCase().trim();

			initIsotope.arrange({
				filter: function (itemElem) {
					return itemElem.textContent.toLowerCase().includes(searchTerm);
				},
			});
		});
	});

	/**
	 * Init swiper sliders
	 */
	function initSwiper() {
		document.querySelectorAll(".init-swiper").forEach(function (swiperElement) {
			let config = JSON.parse(
				swiperElement.querySelector(".swiper-config").innerHTML.trim()
			);

			if (swiperElement.classList.contains("swiper-tab")) {
				initSwiperWithCustomPagination(swiperElement, config);
			} else {
				new Swiper(swiperElement, config);
			}
		});
	}

	window.addEventListener("load", initSwiper);

	/**
	 * Correct scrolling position upon page load for URLs containing hash links.
	 */
	window.addEventListener("load", function (e) {
		if (window.location.hash) {
			if (document.querySelector(window.location.hash)) {
				setTimeout(() => {
					let section = document.querySelector(window.location.hash);
					let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
					window.scrollTo({
						top: section.offsetTop - parseInt(scrollMarginTop),
						behavior: "smooth",
					});
				}, 100);
			}
		}
	});

	/**
	 * Navmenu Scrollspy
	 */
	let navmenulinks = document.querySelectorAll(".navmenu a");

	function navmenuScrollspy() {
		navmenulinks.forEach((navmenulink) => {
			if (!navmenulink.hash) return;
			let section = document.querySelector(navmenulink.hash);
			if (!section) return;
			let position = window.scrollY + 200;
			if (
				position >= section.offsetTop &&
				position <= section.offsetTop + section.offsetHeight
			) {
				document
					.querySelectorAll(".navmenu a.active")
					.forEach((link) => link.classList.remove("active"));
				navmenulink.classList.add("active");
			} else {
				navmenulink.classList.remove("active");
			}
		});
	}
	window.addEventListener("load", navmenuScrollspy);
	document.addEventListener("scroll", navmenuScrollspy);

	// ADDITIONAL

	/**
	 * Frequently Asked Questions Toggle
	 */
	document
		.querySelectorAll(".faq-item h3, .faq-item .faq-toggle")
		.forEach((faqItem) => {
			faqItem.addEventListener("click", () => {
				faqItem.parentNode.classList.toggle("faq-active");
			});
		});

	/**
	 * Edit Modal
	 */
	const modalEdit = document.getElementById("modalEdit");
	if (modalEdit) {
		modalEdit.addEventListener("show.bs.modal", function (event) {
			const button = event.relatedTarget;

			const form = modalEdit.querySelector("form");

			// for kelola tautan
			const id = button.getAttribute("data-id");
			const data_user_id = button.getAttribute("data-user-id");
			const nama = button.getAttribute("data-nama");
			const desc = button.getAttribute("data-desc");
			const url = button.getAttribute("data-url");
			const tim_id = button.getAttribute("data-master_tim_id");
			const judul = button.getAttribute("data-judul");
			const isi = button.getAttribute("data-isi");
			const active = button.getAttribute("data-active");
			const start_date = button.getAttribute("data-start-date");
			const end_date = button.getAttribute("data-end-date");

			const elId = document.getElementById("edit-id");
			if (elId) elId.value = id;

			const elNama = document.getElementById("edit-nama");
			if (elNama) elNama.value = nama;

			const elDesc = document.getElementById("edit-desc");
			if (elDesc) elDesc.value = desc;

			const elUrl = document.getElementById("edit-url");
			if (elUrl) elUrl.value = url;

			const elTim = document.getElementById("edit-master_tim_id");
			if (elTim) elTim.value = tim_id;

			// for kelola skp
			const elEditPeg = document.getElementById("edit-pegawai_id");
			if (elEditPeg) elEditPeg.value = data_user_id;

			const elHiddenPeg = document.getElementById("hidden_pegawai_id");
			if (elHiddenPeg) elHiddenPeg.value = data_user_id;

			// for kelola pengumuman
			const elJudul = document.getElementById("edit-judul");
			if (elJudul) elJudul.value = judul;

			const elIsi = document.getElementById("edit-isi");
			if (elIsi) elIsi.value = isi;

			const elActive = document.getElementById("edit-aktif");
			const elNonaktif = document.getElementById("edit-nonaktif");
			if (elActive && elNonaktif) {
				if (active === "1") {
					elActive.checked = true;
					elNonaktif.checked = false;
				}
				if (active === "0") {
					elActive.checked = false;
					elNonaktif.checked = true;
				}
			}

			const elStartDate = document.getElementById("edit-start_date");
			if (elStartDate) {
				elStartDate.value = start_date ? start_date.split(" ")[0] : "";
			}

			const elEndDate = document.getElementById("edit-end_date");
			if (elEndDate) {
				elEndDate.value = end_date ? end_date.split(" ")[0] : "";
			}

			form.action += id;
		});
	}
})();
