<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Menu | Black & Brew</title>

  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Page CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/menu.css'); ?>">
</head>

<body>

<!-- ============================
     NAVIGATION BAR
     ============================ -->
<nav>
    <!-- Left navigation links -->
    <div class="nav-left">
        <a href="#" class="active">MENU</a>
    </div>

    <div class="nav-left">
        <a href="/contact">CONTACT US</a>
    </div>

    <!-- Center logo -->
    <div class="logo">
        <a href="<?= base_url('/dashboard') ?>">
          <img src="<?= base_url('assets/img/LogoB&B.png') ?>" alt="Logo">
        </a>
    </div>

    <!-- Right navigation links -->
    <div class="nav-right">
        <a href="#">ABOUT US</a>
    </div>

    <div class="nav-right">
        <a href="/profile" class="profile-icon">
            <img src="<?= base_url('assets/img/profileicon.png') ?>" alt="Profile">
        </a>
    </div>
</nav>


<!-- ============================
     CATEGORY NAVIGATION
     ============================ -->
<div class="category-nav">
    <?php $currentCategory = $defaultCategory ?? ''; ?>

    <!-- Loop through categories dynamically -->
    <?php foreach ($categories ?? [] as $cat): ?>
      <a href="#"
         data-slug="<?= esc($cat['slug']) ?>"
         class="<?= ($cat['slug'] === $currentCategory) ? 'active' : '' ?>">
        <?= esc($cat['label']) ?>
      </a>
    <?php endforeach; ?>
</div>


<!-- ============================
     MAIN MENU CONTENT
     ============================ -->
<div class="menu-content">

  <!-- Section title + description -->
  <div class="menu-header">
    <h2 id="menuTitle">Coffee & Beverages</h2>
    <p id="menuDesc">
      Start your day strong or wind down slow with our handcrafted coffee favorites.
    </p>
  </div>

  <!-- Grid container that will be updated via JS -->
  <div class="menu-grid" id="menuGrid">

    <!-- Render initial menu items from backend -->
    <?php foreach ($items as $item): ?>
      <?php $img = base_url('assets/img/' . ($item['image'] ?? 'placeholder.png')); ?>

      <div class="menu-card"
           data-id="<?= esc($item['id']) ?>"
           data-name="<?= esc($item['name']) ?>"
           data-price="<?= esc($item['price']) ?>"
           data-desc="<?= esc($item['description'] ?? '') ?>"
           data-image="<?= $img ?>">

        <!-- Product image -->
        <img src="<?= $img ?>" alt="<?= esc($item['name']) ?>">

        <!-- Product info -->
        <div class="menu-info">
          <h4><?= esc($item['name']) ?></h4>
          <p class="menu-price">₱ <?= number_format($item['price'], 2) ?></p>

          <!-- Open modal button -->
          <button class="view-btn">View</button>
        </div>
      </div>

    <?php endforeach; ?>

  </div> <!-- end menu-grid -->

</div> <!-- end menu-content -->


<!-- ============================
     PRODUCT VIEW MODAL
     ============================ -->
<div class="modal-backdrop" id="modalBackdrop">
  <div class="modal">

    <!-- Close (X) button -->
    <button class="modal-close" id="modalClose">&times;</button>

    <div class="modal-body">

      <!-- Dynamic product image -->
      <img src="<?= base_url('assets/img/placeholder.png') ?>" id="modalImage" class="modal-image">

      <div class="modal-info">

        <!-- Dynamic data populated via JS -->
        <h3 id="modalName">Item Name</h3>
        <p id="modalDesc">Item description</p>
        <p><strong>Price:</strong> <span id="modalPrice">₱ 0.00</span></p>

        <!-- Modal buttons -->
        <div class="modal-actions">
          <button class="btn btn-primary" id="addToCartBtn">Add to Cart</button>
          <button class="btn btn-secondary" id="modalCloseBtn">Close</button>
        </div>

      </div>

    </div> <!-- end modal-body -->
  </div>
</div>


<!-- ============================
     FOOTER
     ============================ -->
<footer class="footer">

  <!-- Left side - social icons -->
  <div class="footer-left">
    <h4>REACH US</h4>
    <div class="social-icons">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
    </div>
  </div>

  <!-- Center logo -->
  <div class="footer-center">
    <img src="<?= base_url('assets/img/LogoB&B.png') ?>" class="footer-logo">
    <p>Copyright © 2016 all rights reserved</p>
  </div>

  <!-- Right side links -->
  <div class="footer-right">
    <a href="#">ABOUT</a>
    <a href="#">TERMS</a>
    <a href="#">PRIVACY</a>
  </div>

</footer>

<!-- External JS for menu functionality -->
<script src="<?= base_url('assets/js/menu.js') ?>"></script>

</body>
</html>
