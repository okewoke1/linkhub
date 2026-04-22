const searchInput = document.getElementById("searchInput");
const cardColumns = document.getElementsByClassName("skp-item");
const cardContainer = document.getElementById("skpContainer");

searchInput.addEventListener("input", function (e) {
	const searchTerm = e.target.value.toLowerCase().trim();
	let hasVisibleCards = false;

	Array.from(cardColumns).forEach((column) => {
		const cardContent = column.textContent.toLowerCase();
		if (cardContent.includes(searchTerm)) {
			column.classList.remove("d-none");
			hasVisibleCards = true;
		} else {
			column.classList.add("d-none");
		}
	});

	// Show "no results" message if no cards are visible
	const existingNoResults = document.querySelector(".no-results");
	if (!hasVisibleCards && !existingNoResults) {
		const noResults = document.createElement("div");
		noResults.className = "no-results";
		noResults.innerHTML =
			'<i class="fas fa-search" style="margin-right: 8px;"></i>Data tidak ditemukan';
		cardContainer.appendChild(noResults);
	} else if (hasVisibleCards && existingNoResults) {
		existingNoResults.remove();
	}
});
