<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile | Black & Brew</title>

  <!-- Icons & Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Page CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/profile.css'); ?>">
</head>
<body>

  <!-- NAVIGATION BAR -->
  <nav>
    <div class="nav-left">
        <!-- Menu page link -->
        <a href="menu">MENU</a>
    </div>

    <div class="nav-left">
        <!-- Contact page link -->
        <a href="/contact">CONTACT US</a>
    </div>

    <!-- Center logo -->
    <div class="logo">
        <a href="<?= base_url('/dashboard') ?>">
          <img src="<?= base_url('assets/img/LogoB&B.png') ?>" alt="Logo">
        </a>
    </div>

    <div class="nav-right">
        <a href="#">ABOUT US</a>
    </div>

    <div class="nav-right">
        <!-- Profile icon (current page) -->
        <a href="/profile" class="profile-icon">
            <img src="<?= base_url('assets/img/profileicon.png') ?>" alt="Profile">
        </a>
    </div>
</nav>

  <!-- PROFILE PAGE CONTENT -->
  <section class="profile-container">

    <!-- Greeting with user’s first name -->
    <h1><span>Hello,</span> <?= esc($user['first_name']) ?></h1>

    <hr>
    <h3>Personal Information</h3>

    <!-- Update profile form -->
    <form action="<?= base_url('/profile/update') ?>" method="post">

      <!-- First & last name fields -->
      <div class="form-group">
        <div>
          <label for="first_name">First Name</label>
          <input type="text" name="first_name" value="<?= esc($user['first_name']) ?>" required>
        </div>

        <div>
          <label for="last_name">Last Name</label>
          <input type="text" name="last_name" value="<?= esc($user['last_name']) ?>" required>
        </div>
      </div>

      <!-- Email & optional password change -->
      <div class="form-group">
        <div>
          <label for="email">Email</label>
          <input type="email" name="email" value="<?= esc($user['email']) ?>" required>
        </div>

        <div>
          <label for="password">New Password (optional)</label>
          <input type="password" name="password" placeholder="Leave blank to keep current password">
        </div>
      </div>

      <!-- Save + Logout buttons -->
      <div class="button-group">
        <button type="submit" class="save-btn">Save Changes</button>
        <a href="<?= base_url('/logout') ?>" class="logout-btn">Logout</a>
      </div>

    </form>
  </section>

  <!-- FOOTER -->
  <footer class="footer">

    <!-- Left side: social media -->
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
      <img src="<?= base_url('assets/img/LogoB&B.png') ?>" alt="Black & Brew Logo" class="footer-logo">
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
