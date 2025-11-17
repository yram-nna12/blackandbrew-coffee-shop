<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public routes
$routes->get('/', 'Home::index'); // Homepage
$routes->get('register', 'RegisterController::index'); // Registration page
$routes->post('register/store', 'RegisterController::store'); // Handles user registration
$routes->get('login', 'LoginController::index'); // Login page
$routes->post('login/auth', 'LoginController::auth'); // Login authentication
$routes->get('logout', 'LoginController::logout'); // Logout user

// User dashboard & profile
$routes->get('/dashboard', 'DashboardController::index'); // User dashboard page
$routes->get('/profile', 'ProfileController::index'); // Profile page
$routes->post('/profile/update', 'ProfileController::update'); // Update profile information

// Menu (customer view)
$routes->get('/menu', 'MenuController::index'); // Menu page
$routes->get('/menu/items/(:segment)', 'MenuController::items/$1'); // AJAX fetch items by category

// Admin login landing (if needed)
$routes->get('/admin', 'AdminController::index'); // Admin landing/login page

// Admin item management (legacy or separate controller)
$routes->post('/admin/items/store', 'AdminItemsController::store'); // Store items (older implementation)

// Admin dashboard
$routes->get('/admin/dashboard', 'AdminController::dashboard'); // Admin dashboard view

// Admin User Management
$routes->get('/admin/users', 'AdminController::users'); // List all users
$routes->get('/admin/users/edit/(:num)', 'AdminController::editUser/$1'); // Edit user form
$routes->post('/admin/users/update/(:num)', 'AdminController::updateUser/$1'); // Update user record
$routes->get('/admin/users/delete/(:num)', 'AdminController::deleteUser/$1'); // Delete user

// Admin Menu Management
$routes->get('/admin/menu', 'AdminMenuController::index'); // Menu list with pagination + filter
$routes->get('/admin/menu/create', 'AdminMenuController::create'); // Add new menu item page
$routes->post('/admin/menu/store', 'AdminMenuController::store'); // Store new menu item
$routes->get('/admin/menu/edit/(:num)', 'AdminMenuController::edit/$1'); // Edit existing item
$routes->post('/admin/menu/update/(:num)', 'AdminMenuController::update/$1'); // Update item
$routes->get('/admin/menu/delete/(:num)', 'AdminMenuController::delete/$1'); // Delete item

// Contact page
$routes->get('/contact', 'ContactController::index'); // Contact form page
$routes->post('/contact/send', 'ContactController::send'); // Handle contact form submission
