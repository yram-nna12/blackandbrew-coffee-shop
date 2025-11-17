<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account</title>

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Page-specific CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/register.css'); ?>">
</head>
<body>

  <!-- Register form wrapper -->
  <div class="form-container">

    <!-- Page title and subtitle -->
    <h1>Create Account</h1>
    <p class="subtitle">create your account and start enjoying exclusive perks</p>

    <!-- Registration form -->
    <form action="<?= base_url('/register/store') ?>" method="post">
      <!-- CSRF protection token -->
      <?= csrf_field() ?>

      <!-- First and last name fields in one row -->
      <div class="input-row">
        <input
          type="text"
          name="first_name"
          placeholder="First Name"
          value="<?= set_value('first_name') ?>">

        <input
          type="text"
          name="last_name"
          placeholder="Last Name"
          value="<?= set_value('last_name') ?>">
      </div>

      <!-- Email field -->
      <input
        type="email"
        name="email"
        placeholder="Email"
        value="<?= set_value('email') ?>">

      <!-- Password + confirm password fields -->
      <input
        type="password"
        name="password"
        placeholder="Password">

      <input
        type="password"
        name="confirm_password"
        placeholder="Confirm Password">

      <!-- Display validation errors (if any) -->
      <?php if (isset($validation)) : ?>
        <div class="error"><?= $validation->listErrors() ?></div>
      <?php endif; ?>

      <!-- Submit button -->
      <button type="submit" class="btn">SIGN UP</button>
    </form>

    <!-- Placeholder for Google login integration -->
    <p class="google-login">Or Sign In with <a href="#">Google</a></p>

    <!-- Link to login page for existing users -->
    <p class="login-text">
      Already have an account?
      <a href="<?= base_url('/login') ?>">Login here</a>
    </p>
  </div>

</body>
</html>
