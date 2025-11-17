<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User | Admin Panel</title>

    <!-- Google Fonts + Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Material+Symbols+Outlined" rel="stylesheet">

    <!-- Page-specific stylesheet -->
    <link rel="stylesheet" href="<?= base_url('assets/css/edit_user.css'); ?>">
</head>
<body>

    <!-- Sidebar Navigation -->
    <aside class="sidebar">
        <div>
            <!-- Logo -->
            <div class="logo">
                <img src="<?= base_url('assets/img/LogoV2B&B.png') ?>" alt="Black & Brew">
            </div>

            <!-- Navigation Menu -->
            <nav class="nav">
                <a href="<?= base_url('admin/dashboard') ?>">
                    <span class="material-symbols-outlined">dashboard</span> Dashboard
                </a>

                <a href="#">
                    <span class="material-symbols-outlined">menu</span> Menu
                </a>

                <!-- Active page: Users -->
                <a href="<?= base_url('admin/users') ?>" class="active">
                    <span class="material-symbols-outlined">group</span> Users
                </a>

                <a href="#">
                    <span class="material-symbols-outlined">shopping_cart</span> Orders
                </a>
            </nav>
        </div>

        <!-- Logout Link -->
        <div class="logout">
            <a href="<?= base_url('logout') ?>">Log Out</a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main">
        <div class="header-title">Edit User</div>

        <!-- Success or Error Flash Messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="flash success"><?= session()->getFlashdata('success') ?></div>
        <?php elseif (session()->getFlashdata('error')): ?>
            <div class="flash error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <!-- Edit User Form -->
        <form action="<?= base_url('admin/users/update/'.$user['id']) ?>" method="post">
            <?= csrf_field() ?> <!-- CSRF protection token -->

            <!-- Input fields prefilled with current user data -->
            <input type="text" name="first_name" id="first_name" placeholder="First Name" value="<?= esc($user['first_name']) ?>" required>
            <input type="text" name="last_name" id="last_name" placeholder="Last Name" value="<?= esc($user['last_name']) ?>" required>
            <input type="email" name="email" id="email" placeholder="Email" value="<?= esc($user['email']) ?>" required>

            <!-- Action Buttons -->
            <div class="buttons">
                <button type="submit">Save Changes</button>
                <a href="<?= base_url('admin/users') ?>" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </main>

</body>
</html>
