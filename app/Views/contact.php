<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us</title>

  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Google Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Font Awesome (footer social icons) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Page CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/contact.css'); ?>">
</head>

<body>
  <!-- NAV -->
  <nav>
    <div class="nav-left">
      <a href="menu">MENU</a>
    </div>

    <div class="nav-left">
      <a href="/contact" class="active">CONTACT US</a>
    </div>

    <div class="logo">
      <a href="<?= base_url('/dashboard') ?>">
        <img src="<?= base_url('assets/img/LogoB&B.png') ?>" alt="Logo">
      </a>
    </div>

    <div class="nav-right">
      <a href="#">ABOUT US</a>
    </div>

    <div class="nav-right">
      <a href="/profile" class="profile-icon">
        <img src="<?= base_url('assets/img/profileicon.png') ?>" alt="Profile">
      </a>
    </div>
  </nav>

  <!-- CONTACT SECTION -->
  <section class="contact-wrapper">
    <div class="contact-inner">
      <div class="left-pane">
        <h1>Contact Us</h1>
        <p>We’d love to hear from you! Fill out the form below and our team will reach out shortly.</p>
        <ul>
          <li><span class="material-icons">mail</span> brewblack46@gmail.com</li>
          <li><span class="material-icons">place</span> Juaning Street, Metro Manila, NCR</li>
          <li><span class="material-icons">call</span> +639456879531</li>
        </ul>
      </div>

      <div class="right-pane">
        <form id="contactForm" class="contact-form" method="POST"
              action="<?= site_url('contact/send') ?>" autocomplete="on" novalidate>
          <?= csrf_field() ?>

          <label for="subject" class="sr-only">Subject</label>
          <input id="subject" name="subject" type="text"
                 placeholder="Subject / Concern" required autocomplete="off" value="<?= old('subject') ?>">

          <label for="email" class="sr-only">Email</label>
          <input id="email" name="email" type="email"
                 placeholder="Email" required value="<?= old('email', $userEmail) ?>" autocomplete="email">

          <label for="message" class="sr-only">Message</label>
          <textarea id="message" name="message"
                    placeholder="Message" required autocomplete="off"><?= old('message') ?></textarea>

          <button type="submit" id="sendBtn"
                  class="btn-send" aria-label="Send message">SEND</button>
        </form>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-left">
      <h4>REACH US</h4>
      <div class="social-icons">
        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
      </div>
    </div>

    <div class="footer-center">
      <img src="<?= base_url('assets/img/LogoB&B.png') ?>" alt="Black & Brew Logo" class="footer-logo">
      <p>Copyright © 2016 All rights reserved</p>
    </div>

    <div class="footer-right">
      <a href="#">ABOUT</a>
      <a href="#">TERMS</a>
      <a href="#">PRIVACY</a>
    </div>
  </footer>

  <!-- External JS for contact page logic -->
  <script src="<?= base_url('assets/js/contact.js'); ?>"></script>
</body>
</html>
