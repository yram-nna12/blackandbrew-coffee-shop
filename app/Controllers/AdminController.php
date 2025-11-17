<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\MenuItemModel;

class AdminController extends Controller
{
    public function index()
    {
        // Redirect /admin to the admin dashboard
        return redirect()->to('/admin/dashboard');
    }

    public function dashboard()
    {
        $session = session();

        // Ensure only admin can access dashboard
        if ($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        $userModel = new UserModel();
        $menuModel = new MenuItemModel();

        // Load dashboard summary: total customers + total menu items
        $data = [
            'totalUsers' => $userModel->where('role', 'customer')->countAllResults(),
            'totalMenu'  => $menuModel->countAll(),
        ];

        return view('admin/dashboard', $data);
    }

    public function users()
    {
        $session = session();

        // Restrict access to admin only
        if ($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        $userModel = new UserModel();

        // Retrieve customer accounts with pagination
        $data['users'] = $userModel
            ->where('role', 'customer')
            ->paginate(8);

        // Pagination handler
        $data['pager'] = $userModel->pager;

        return view('admin/users', $data);
    }

    public function editUser($id)
    {
        $session = session();

        // Block non-admin access
        if ($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        // If user ID does not exist
        if (!$data['user']) {
            return redirect()->to('/admin/users')->with('error', 'User not found.');
        }

        return view('admin/edit_user', $data);
    }

    public function updateUser($id)
    {
        $session = session();

        // Admin-only restriction
        if ($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        $userModel = new UserModel();

        // Update user basic info
        $userModel->update($id, [
            'first_name' => $this->request->getVar('first_name'),
            'last_name'  => $this->request->getVar('last_name'),
            'email'      => $this->request->getVar('email'),
        ]);

        return redirect()->to('/admin/users')->with('success', 'User updated successfully.');
    }

    public function deleteUser($id)
    {
        $session = session();

        // Restrict access to admin
        if ($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        $userModel = new UserModel();
        $user = $userModel->find($id);

        // Ensure user exists before deleting
        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'User not found.');
        }

        // Delete user record
        $userModel->delete($id);

        return redirect()->to('/admin/users')->with('success', 'User deleted successfully.');
    }

    // Logout and end admin session
    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }
}
