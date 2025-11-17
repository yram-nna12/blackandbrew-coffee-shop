<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Menu | Black & Brew</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- Google Fonts + Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Material+Symbols+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Page-specific stylesheet -->
    <link rel="stylesheet" href="<?= base_url('assets/css/admin_menu.css'); ?>">
</head>
<body>

    <!-- Sidebar Navigation -->
    <aside class="sidebar">
        <div>
            <!-- Logo -->
            <div class="logo">
                <img src="<?= base_url('assets/img/LogoV2B&B.png') ?>" alt="Black & Brew">
            </div>

            <!-- Navigation menu -->
            <nav class="nav">
                <a href="<?= base_url('admin/dashboard') ?>">
                    <span class="material-symbols-outlined">dashboard</span> Dashboard
                </a>

                <!-- Active Menu Page -->
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

    <!-- Main Content -->
    <main class="main">

        <!-- Page Title -->
        <div class="title">Product Menu</div>

        <!-- Flash messages for success/error -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="flash success"><?= session()->getFlashdata('success') ?></div>
        <?php elseif (session()->getFlashdata('error')): ?>
            <div class="flash error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <div class="top-row">
            <div class="actions">
                <!-- Category Filter Dropdown -->
                <form class="filter-form" method="get" action="<?= base_url('/admin/menu') ?>">
                    <select name="category" onchange="this.form.submit()">
                        <option value="">All Categories</option>

                        <!-- Loop all categories and mark selected category -->
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= esc($cat['slug']) ?>" <?= ($selectedCategory == $cat['slug']) ? 'selected' : '' ?>>
                                <?= esc($cat['label']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>

            <!-- Add New Product Button -->
            <div>
                <a href="<?= base_url('/admin/menu/create') ?>" class="btn-add">+ Add New Product</a>
            </div>
        </div>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th style="width:30%;">Name</th>
                        <th style="width:10%;">Price</th>
                        <th style="width:15%;">Category</th>
                        <th style="width:20%;">Image</th>
                        <th style="width:25%;">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Check if menu items exist -->
                    <?php if (!empty($menu_items)): ?>

                        <!-- Loop all menu items -->
                        <?php foreach ($menu_items as $item): ?>
                            <tr>
                                <td><?= esc($item['name']) ?></td>
                                <td><?= esc($item['price']) ?></td>
                                <td><?= esc($item['category']) ?></td>

                                <!-- Display uploaded image or fallback placeholder -->
                                <td>
                                    <img src="<?= !empty($item['image']) 
                                            ? base_url('assets/img/' . $item['image']) 
                                            : base_url('assets/img/placeholder.png') ?>"
                                        alt="<?= esc($item['name']) ?>">
                                </td>

                                <!-- Edit & Delete buttons -->
                                <td class="actions-col">
                                    <a href="<?= base_url('/admin/menu/edit/' . $item['id']) ?>" title="Edit">
                                        <span class="material-icons">edit</span>
                                    </a>

                                    <a href="<?= base_url('/admin/menu/delete/' . $item['id']) ?>" 
                                       onclick="return confirm('Delete this item?')" title="Delete">
                                        <span class="material-icons">delete</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php else: ?>
                        <!-- No items found message -->
                        <tr>
                            <td colspan="5" style="text-align:center; padding:20px;">No menu items found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="pagination">
                <?= $pager->links('default', 'default_full') ?>
            </div>
        </div>
    </main>

</body>
</html>
