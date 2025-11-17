<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Product | Admin</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Google Fonts + Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Material+Symbols+Outlined" rel="stylesheet">
    <!-- Page-specific stylesheet -->
    <link rel="stylesheet" href="<?= base_url('assets/css/edit_menu_item.css'); ?>">
</head>
<body>

    <!-- Sidebar Navigation -->
    <aside class="sidebar">
        <div>
            <!-- Brand Logo -->
            <div class="logo">
                <img src="<?= base_url('assets/img/LogoV2B&B.png') ?>" alt="Black & Brew">
            </div>

            <!-- Navigation Links -->
            <nav class="nav">
                <a href="<?= base_url('admin/dashboard') ?>">
                    <span class="material-symbols-outlined">dashboard</span> Dashboard
                </a>

                <!-- Active link for Menu page -->
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

        <!-- Logout Option -->
        <div class="logout">
            <a href="<?= base_url('logout') ?>">Log Out</a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main">
        <div class="card">
            <h2>Edit Product</h2>

            <!-- Flash error message if validation or upload fails -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="flash error"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <!-- Edit form for existing menu item -->
            <form action="<?= base_url('/admin/menu/update/' . $item['id']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?> <!-- CSRF token for security -->

                <!-- Product Name -->
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" value="<?= esc($item['name']) ?>" required>

                <!-- Product Price -->
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" id="price" value="<?= esc($item['price']) ?>" required>

                <!-- Product Description -->
                <label for="description">Description</label>
                <textarea name="description" id="description"><?= esc($item['description']) ?></textarea>

                <!-- Product Category Dropdown -->
                <label for="category">Category</label>
                <select name="category" id="category" required>
                    <option value="">Select category</option>
                    <option value="coffee-beverages" <?= $item['category']=='coffee-beverages'?'selected':'' ?>>Coffee & Beverages</option>
                    <option value="pastries-bread" <?= $item['category']=='pastries-bread'?'selected':'' ?>>Pastries & Bread</option>
                    <option value="light-bites" <?= $item['category']=='light-bites'?'selected':'' ?>>Light Bites</option>
                </select>

                <!-- Current product image preview -->
                <div class="current-img">
                    <label>Current Image</label>

                    <?php if (!empty($item['image'])): ?>
                        <div>
                            <img src="<?= base_url('assets/img/' . $item['image']) ?>" alt="current" width="120" style="border-radius:8px;">
                        </div>
                    <?php else: ?>
                        <div>No image</div>
                    <?php endif; ?>
                </div>

                <!-- File input for replacing image -->
                <label for="image">Replace Image (optional)</label>
                <input type="file" name="image" id="image" accept="image/*">

                <!-- Form Action Buttons -->
                <div class="buttons">
                    <button type="submit">Save Changes</button>
                    <a href="<?= base_url('/admin/menu') ?>" class="btn-cancel">Cancel</a>
                </div>
            </form>
        </div>
    </main>

</body>
</html>
