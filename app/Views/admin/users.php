<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | Admin Panel</title>

    <!-- Google Fonts + Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Material+Symbols+Outlined" rel="stylesheet">

    <!-- Page-specific stylesheet -->
    <link rel="stylesheet" href="<?= base_url('assets/css/users.css'); ?>">
</head>
<body>

    <!-- Sidebar Navigation -->
    <aside class="sidebar">
        <div>
            <!-- Logo section -->
            <div class="logo">
                <img src="<?= base_url('assets/img/LogoV2B&B.png') ?>" alt="Black & Brew">
            </div>

            <!-- Navigation menu -->
            <nav class="nav">
                <a href="<?= base_url('admin/dashboard') ?>">
                    <span class="material-symbols-outlined">dashboard</span> Dashboard
                </a>

                <a href="menu">
                    <span class="material-symbols-outlined">menu</span> Menu
                </a>

                <!-- Active link: Users -->
                <a href="<?= base_url('admin/users') ?>" class="active">
                    <span class="material-symbols-outlined">group</span> Users
                </a>

                <a href="#">
                    <span class="material-symbols-outlined">shopping_cart</span> Orders
                </a>
            </nav>
        </div>

        <!-- Logout button -->
        <div class="logout">
            <a href="<?= base_url('logout') ?>">Log Out</a>
        </div>
    </aside>

    <!-- Main Content Section -->
    <main class="main">

        <!-- Page header -->
        <div class="header-title">Customer Details</div>

        <!-- Users table -->
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Created At</th>
                    <th></th> <!-- Actions column -->
                </tr>
            </thead>

            <tbody>
                <!-- Check if users exist -->
                <?php if (!empty($users)): ?>

                    <!-- Loop all users -->
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <!-- First Name -->
                            <td data-label="First Name">
                                <strong><?= esc($user['first_name']) ?></strong>
                            </td>

                            <!-- Last Name -->
                            <td data-label="Last Name">
                                <?= esc($user['last_name']) ?>
                            </td>

                            <!-- Email Address -->
                            <td data-label="Email">
                                <?= esc($user['email']) ?>
                            </td>

                            <!-- Password placeholder (for security, never display actual hash) -->
                            <td data-label="Password">
                                (hash password)
                            </td>

                            <!-- Account creation date -->
                            <td data-label="Created At">
                                <?= esc($user['created_at']) ?>
                            </td>

                            <!-- Edit/Delete buttons -->
                            <td class="actions" data-label="">
                                <a href="<?= base_url('admin/users/edit/'.$user['id']) ?>">
                                    <span class="material-symbols-outlined">edit</span>
                                </a>

                                <a href="<?= base_url('admin/users/delete/'.$user['id']) ?>" 
                                   onclick="return confirm('Delete this user?')">
                                    <span class="material-symbols-outlined">delete</span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                <?php else: ?>
                    <!-- No users found fallback -->
                    <tr>
                        <td colspan="6" style="text-align:center;">No users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pagination links -->
        <div class="pagination">
            <?= $pager->links('default', 'default_full') ?>
        </div>
    </main>

</body>
</html>
