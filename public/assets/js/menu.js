// Run script only after the DOM is fully loaded
document.addEventListener("DOMContentLoaded", function () {

  /* ---------------------------------------------------------
    ELEMENT REFERENCES
    Collect all important elements for category filtering
    and modal display.
  --------------------------------------------------------- */

  // Both sidebar & top category navigation links
  const categoryLinks = Array.from(document.querySelectorAll('.side-nav a, .category-nav a'));

  // Header & description area above the product list
  const header = document.getElementById('menuTitle');
  const desc = document.getElementById('menuDesc');

  // Grid container where items will be displayed
  const grid = document.getElementById('menuGrid');

  // Modal elements
  const modalBackdrop = document.getElementById('modalBackdrop');
  const modalImage = document.getElementById('modalImage');
  const modalName = document.getElementById('modalName');
  const modalDesc = document.getElementById('modalDesc');
  const modalPrice = document.getElementById('modalPrice');
  const modalClose = document.getElementById('modalClose');
  const modalCloseBtn = document.getElementById('modalCloseBtn');
  const addToCartBtn = document.getElementById('addToCartBtn');

  /* ---------------------------------------------------------
    CATEGORY META INFO
    Used to update header title + description when the user 
    switches between categories.
  --------------------------------------------------------- */

  const categoryInfo = {
    "coffee-beverages": {
      label: "Coffee & Beverages",
      description: "Start your day strong or wind down slow with our handcrafted coffee favorites brewed fresh, bold, and comforting in every cup."
    },
    "pastries-bread": {
      label: "Pastries & Bread",
      description: "Freshly baked pastries and bread — sweet, soft, and made to pair perfectly with your favorite coffee."
    },
    "light-bites": {
      label: "Light Bites",
      description: "Small plates that make a big impression. Satisfying, shareable, and freshly made."
    }
  };

  /* ---------------------------------------------------------
    Prevent HTML injection for safety
  --------------------------------------------------------- */
  function escapeHtml(text) {
    if (!text) return "";
    return text.replace(/[&<>"'`=\/]/g, (s) => ({
      "&": "&amp;",
      "<": "&lt;",
      ">": "&gt;",
      '"': "&quot;",
      "'": "&#39;",
      "/": "&#x2F;"
    }[s]));
  }

  /* ---------------------------------------------------------
    OPEN MODAL WITH ITEM DETAILS
  --------------------------------------------------------- */
  function openModal(item) {
    // Populate modal with product info
    modalImage.src = item.image_url ?? item.image ?? "/assets/img/placeholder.png";
    modalName.textContent = item.name || "";
    modalDesc.textContent = item.description || "No description available.";
    modalPrice.textContent = "₱ " + parseFloat(item.price || 0).toFixed(2);

    // Show modal
    modalBackdrop.style.display = "flex";

    // Placeholder: add to cart logic
    addToCartBtn.onclick = () =>
      alert((item.name || "Item") + " added to cart (placeholder).");
  }

  /* ---------------------------------------------------------
    CLOSE MODAL
  --------------------------------------------------------- */
  function closeModal() {
    modalBackdrop.style.display = "none";
  }

  // Close when clicking X
  modalClose?.addEventListener("click", closeModal);

  // Close when clicking "Close" button
  modalCloseBtn?.addEventListener("click", closeModal);

  // Close when clicking outside modal
  modalBackdrop?.addEventListener("click", (e) => {
    if (e.target === modalBackdrop) closeModal();
  });

  // Close with ESC key
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeModal();
  });

  /* ---------------------------------------------------------
    ATTACH MODAL VIEW BUTTONS FOR SERVER-RENDERED ITEMS
  --------------------------------------------------------- */
  function attachViewButtonsOnExistingCards() {
    document.querySelectorAll(".menu-card").forEach((card) => {
      const viewBtn = card.querySelector(".view-btn");
      if (!viewBtn) return;

      // Collect item info from dataset
      const item = {
        id: card.dataset.id,
        name: card.dataset.name,
        price: card.dataset.price,
        description: card.dataset.desc,
        image_url: card.dataset.image
      };

      viewBtn.addEventListener("click", () => openModal(item));
    });
  }

  /* ---------------------------------------------------------
    CREATE CARD ELEMENT (USED WHEN SWITCHING CATEGORIES)
  --------------------------------------------------------- */
  function buildCardForItem(item) {
    const imgSrc = item.image_url || `/assets/img/${item.image || "placeholder.png"}`;

    const card = document.createElement("div");
    card.className = "menu-card";

    // Add attributes to card for consistency
    card.dataset.id = item.id;
    card.dataset.name = item.name;
    card.dataset.price = item.price;
    card.dataset.desc = item.description;
    card.dataset.image = imgSrc;

    card.innerHTML = `
      <img src="${imgSrc}" alt="${escapeHtml(item.name)}">
      <div class="menu-info">
        <h4 class="menu-name">${escapeHtml(item.name)}</h4>
        <p class="menu-price" style="display:none;">₱ ${parseFloat(item.price).toFixed(2)}</p>
        <button class="view-btn">View</button>
      </div>
    `;

    // Attach modal open button
    card.querySelector(".view-btn").addEventListener("click", () => openModal(item));

    return card;
  }

  /* ---------------------------------------------------------
    LOAD ITEMS FROM SERVER WHEN CATEGORY IS CLICKED
  --------------------------------------------------------- */
  function loadCategory(slug) {
    // Update header from category map
    header.textContent = categoryInfo[slug]?.label || slug;
    desc.textContent = categoryInfo[slug]?.description || "";

    // Fetch filtered items
    fetch(`/menu/items/${slug}`)
      .then(res => res.json())
      .then(items => {
        grid.innerHTML = ""; // Clear old items

        if (!items.length) {
          grid.innerHTML = "<p>No items available.</p>";
          return;
        }

        // Add each item card to the grid
        items.forEach((item) => grid.appendChild(buildCardForItem(item)));
      })
      .catch(() => {
        grid.innerHTML = "<p>Failed to load items.</p>";
      });
  }

  /* ---------------------------------------------------------
    CATEGORY NAV CLICK HANDLERS
  --------------------------------------------------------- */
  categoryLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();

      // Remove active state from all links
      categoryLinks.forEach((l) => l.classList.remove("active"));

      // Highlight clicked category
      this.classList.add("active");

      const slug = this.dataset.slug;
      if (slug) loadCategory(slug);
    });
  });

  /* ---------------------------------------------------------
    LOAD INITIAL CATEGORY
    - If one has .active, load it
    - Otherwise load the first category
  --------------------------------------------------------- */
  const activeCategory =
    categoryLinks.find((l) => l.classList.contains("active")) || categoryLinks[0];

  if (activeCategory) activeCategory.click();

  /* ---------------------------------------------------------
    ATTACH MODAL BUTTONS FOR INITIAL SERVER-RENDERED ITEMS
  --------------------------------------------------------- */
  attachViewButtonsOnExistingCards();
});
