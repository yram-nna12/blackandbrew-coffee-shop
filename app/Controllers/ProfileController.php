<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $session   = session();
        $userModel = new UserModel();

        // Get logged-in user ID from session (set in LoginController)
        $userId = $session->get('user_id');

        // If no user ID in session, force login
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Please login first.');
        }

        // Fetch user record from database
        $user = $userModel->find($userId);

        // If user record does not exist, redirect back to login
        if (!$user) {
            return redirect()->to('/login')->with('error', 'User not found.');
        }

        // Load profile view and pass user data
        return view('profile', ['user' => $user]);
    }

    public function update()
    {
        $session   = session();
        $userModel = new UserModel();

        // Get current user ID from session
        $userId = $session->get('user_id');

        // If not logged in, redirect to login
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Please login first.');
        }

        // Collect updated input fields
        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name'  => $this->request->getPost('last_name'),
            'email'      => $this->request->getPost('email'),
        ];

        // If a new password is provided, hash and update it
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // Update user record in database
        $userModel->update($userId, $data);

        // Flash success message for next request
        $session->setFlashdata('success', 'Profile updated successfully.');

        // Refresh session data so header / profile shows new values immediately
        $session->set([
            'first_name' => $data['first_name'],
            'email'      => $data['email']
        ]);

        // Redirect back to profile page
        return redirect()->to('/profile');
    }
}
