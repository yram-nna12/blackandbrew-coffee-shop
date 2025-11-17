<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Black & Brew</title>
    <!-- Import Material Icons and custom admin CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css'); ?>">
</head>
<body>
    <!-- Sidebar with logo and navigation links -->
    <aside class="sidebar">
        <div>
            <!-- Brand logo -->
            <div class="logo">
                <img src="<?= base_url('assets/img/LogoV2B&B.png') ?>" alt="Black & Brew">
            </div>
            <!-- Admin navigation menu -->
            <nav class="nav">
                <!-- Active page: Dashboard -->
                <a href="<?= base_url('admin/dashboard') ?>" class="active">
                    <span class="material-symbols-outlined">dashboard</span> Dashboard
                </a>
                <!-- Link to menu management -->
                <a href="menu">
                    <span class="material-symbols-outlined">menu</span> Menu
                </a>
                <!-- Link to users management -->
                <a href="users">
                    <span class="material-symbols-outlined">group</span> Users
                </a>
                <!-- Placeholder link for orders page -->
                <a href="#">
                    <span class="material-symbols-outlined">shopping_cart</span> Orders
                </a>
            </nav>
        </div>
        <!-- Logout link at bottom of sidebar -->
        <div class="logout">
            <a href="<?= base_url('logout') ?>">Log Out</a>
        </div>
    </aside>

    <!-- Main dashboard content -->
    <main class="main">
        <h1>Hi Admin!</h1>

        <!-- Income summary section (placeholder for future data) -->
        <div class="income-box">
            <h2>Income (in peso)</h2>
            <div class="income-amount">000.00</div> <!-- Placeholder for future data -->
        </div>

        <!-- Summary cards showing key stats -->
        <div class="cards">
            <!-- Total users card (uses value passed from controller, fallback to '00') -->
            <div class="card">
                <h3>Total Users</h3>
                <p><?= $totalUsers ?? '00' ?></p>
            </div>
            <!-- Total menu items card (uses value passed from controller, fallback to '00') -->
            <div class="card">
                <h3>Total Menu</h3>
                <p><?= $totalMenu ?? '00' ?></p>
            </div>
            <!-- Extra card reserved for future features -->
            <div class="card">
                <h3>Coming Soon..</h3>
            </div>
        </div>
    </main>

</body>
</html>
