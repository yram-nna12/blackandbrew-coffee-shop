<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add Product | Admin</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Google Fonts and Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Material+Symbols+Outlined" rel="stylesheet">
    <!-- Page-specific stylesheet -->
    <link rel="stylesheet" href="<?= base_url('assets/css/add_menu_item.css'); ?>">
</head>
<body>
    <!-- Sidebar navigation -->
    <aside class="sidebar">
        <div>
            <!-- Logo section -->
            <div class="logo">
                <img src="<?= base_url('assets/img/LogoV2B&B.png') ?>" alt="Black & Brew">
            </div>

            <!-- Admin navigation menu -->
            <nav class="nav">
                <a href="<?= base_url('admin/dashboard') ?>">
                    <span class="material-symbols-outlined">dashboard</span> Dashboard
                </a>

                <!-- Current active page: Menu -->
                <a href="<?= base_url('admin/menu') ?>" class="active">
                    <span class="material-symbols-outlined">menu</span> Menu
                </a>

                <a href="<?= base_url('admin/users') ?>">
                    <span class="material-symbols-outlined">group</span> Users
                </a>

                <a href="#">
                    <span class="material-symbols-outlined">shopping_cart</span> Orders
                </a>
            </nav>
        </div>

        <!-- Logout link -->
        <div class="logout">
            <a href="<?= base_url('logout') ?>">Log Out</a>
        </div>
    </aside>

    <!-- Main content area -->
    <main class="main">
        <div class="card">
            <h2>Add New Product</h2>

            <!-- Display error flash message if present -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="flash error"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <!-- Form for adding a new menu item -->
            <form action="<?= base_url('/admin/menu/store') ?>" method="post" enctype="multipart/form-data">
                <!-- CSRF protection -->
                <?= csrf_field() ?>

                <!-- Product name input -->
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" value="<?= set_value('name') ?>" required>

                <!-- Product price input -->
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" id="price" value="<?= set_value('price') ?>" required>

                <!-- Product description textarea -->
                <label for="description">Description</label>
                <textarea name="description" id="description"><?= set_value('description') ?></textarea>

                <!-- Product category dropdown -->
                <label for="category">Category</label>
                <select name="category" id="category" required>
                    <option value="">Select category</option>
                    <option value="coffee-beverages">Coffee & Beverages</option>
                    <option value="pastries-bread">Pastries & Bread</option>
                    <option value="light-bites">Light Bites</option>
                </select>

                <!-- Optional image upload -->
                <label for="image">Image (optional)</label>
                <input type="file" name="image" id="image" accept="image/*">

                <!-- Form action buttons -->
                <div class="buttons">
                    <button type="submit">Save</button>
                    <a href="<?= base_url('/admin/menu') ?>" class="btn-cancel">Cancel</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
