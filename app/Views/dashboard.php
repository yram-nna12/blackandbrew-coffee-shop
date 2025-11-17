<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black & Brew</title>

    <!-- Font Awesome (social icons in footer) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Page-specific stylesheet -->
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css'); ?>">
</head>

<body>

<!-- MAIN NAVIGATION BAR -->
<nav>
    <!-- Left navigation links -->
    <div class="nav-left">
        <!-- Link to menu page -->
        <a href="/menu">MENU</a>
    </div>
    <div class="nav-left">
        <!-- Link to contact page -->
        <a href="/contact">CONTACT US</a>
    </div>

    <!-- Center logo -->
    <div class="logo">
        <img src="<?= base_url('assets/img/LogoB&B.png') ?>" alt="Logo">
    </div>

    <!-- Right navigation links -->
    <div class="nav-right">
        <!-- About page (placeholder link) -->
        <a href="#">ABOUT US</a>
    </div>
    <div class="nav-right">
        <!-- Profile icon link to user profile -->
        <a href="/profile" class="profile-icon">
            <img src="<?= base_url('assets/img/profileicon.png') ?>" alt="Profile">
        </a>
    </div>
</nav>

<!-- HERO SECTION (top banner) -->
<section class="hero">
    <div class="hero-text">
        <!-- Greeting text -->
        <h1>Good to see you again!</h1>
        <!-- Short description / tagline -->
        <p>
            Take a moment to unwind — your favorite brews and new blends are waiting just for you.
            Crafted with passion and perfection, every cup at Black & Brew tells a story worth tasting.”
        </p>
        <!-- Call-to-action button (order trigger) -->
        <button class="order-btn">ORDER NOW</button>
    </div>

    <!-- Hero image on the right side -->
    <div class="hero-image">
        <img src="<?= base_url('assets/img/coffee.png') ?>" alt="Coffee Cups">
    </div>
</section>

<!-- FEATURED BREW SECTION -->
<section class="featured-brew">
    <div class="container">
        <!-- Text description for featured drink -->
        <div class="brew-text">
            <h2>Today's Featured Brew:</h2>
            <h1>Pink Venom Latte</h1>
            <p>
                A daring fusion of bold espresso and sweet raspberry cream smooth, striking, and unapologetically powerful.
                Inspired by Blackpink’s Pink Venom, this brew delivers a bite of intensity with a touch of elegance in every sip.
            </p>
            <p class="quote">“Taste the bold. Feel the beat.”</p>
            <!-- Button / link to try the featured drink (placeholder) -->
            <a href="#" class="btn">TRY PINK VENOM LATTE</a>
        </div>

        <!-- Featured drink image -->
        <div class="brew-image">
            <img src="<?= base_url('assets/img/PinkVenom.png') ?>" alt="Profile Icon">
        </div>
    </div>
</section>

<!-- THIRD PROMO / BANNER SECTION -->
<section class="third-section">
    <!-- Full-width image banner -->
    <img 
        src="<?= base_url('assets/img/3rdHero.png') ?>" 
        alt="Moonlight Macchiato - What's New" 
        class="third-image">
</section>

<!-- FOOTER SECTION -->
<footer class="footer">
  <!-- Left side: social links -->
  <div class="footer-left">
    <h4>REACH US</h4>
    <div class="social-icons">
      <!-- Social media icon links (placeholders) -->
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
    </div>
  </div>

  <!-- Center: logo + copyright -->
  <div class="footer-center">
    <img 
      src="<?= base_url('assets/img/LogoB&B.png') ?>" 
      alt="Black & Brew Logo" 
      class="footer-logo">
    <p>Copyright © 2016 all rights reserved</p>
  </div>

  <!-- Right side: footer links -->
  <div class="footer-right">
    <a href="#">ABOUT</a>
    <a href="#">TERMS</a>
    <a href="#">PRIVACY</a>
  </div>
</footer>

</body>
</html>
