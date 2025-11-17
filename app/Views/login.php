<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Page-specific stylesheet -->
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css'); ?>">
</head>

<body>

    <!-- Centered login form container -->
    <div class="form-container">

        <!-- Page heading and short message -->
        <h1>Welcome Back!</h1>
        <p class="subtitle">We’re glad to see you again—let’s pick up right where you left off.</p>

        <!-- Show error message from session if login failed -->
        <?php if(session()->getFlashdata('error')): ?>
            <div class="error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <!-- Login form posts to login/auth controller method -->
        <form action="<?= base_url('login/auth') ?>" method="post">

            <!-- Email input field -->
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <!-- Password input field -->
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn">LOGIN</button>
        </form>

        <!-- Link to registration page for new users -->
        <div class="login-text">
            Don’t have an account yet? <a href="<?= base_url('register') ?>">Sign Up</a>
        </div>

    </div>
</body>
</html>
