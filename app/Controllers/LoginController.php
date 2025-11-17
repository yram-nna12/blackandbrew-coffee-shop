<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function index()
    {
        // Show login view
        echo view('login');
    }

    public function auth()
    {
        // Start / get session
        $session   = session();
        $userModel = new UserModel();

        // Get form inputs
        $email    = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Fetch user record by email
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            // Verify entered password against hashed password in DB
            if (password_verify($password, $user['password'])) {

                // Data to store in session after successful login
                $sessionData = [
                    'user_id'    => $user['id'],
                    'email'      => $user['email'],
                    'first_name' => $user['first_name'],
                    'role'       => $user['role'],   // 'admin' or 'customer'
                    'isLoggedIn' => true,            // flag for auth checks
                    'login_time' => time()           // used for session timeout
                ];

                // Save data into session
                $session->set($sessionData);

                // Redirect based on user role
                if ($user['role'] === 'admin') {
                    return redirect()->to('/admin/dashboard');
                } else {
                    return redirect()->to('/dashboard');
                }

            } else {
                // Password incorrect → set error message and go back to login
                $session->setFlashdata('error', 'Wrong password');
                return redirect()->to('/login');
            }
        } else {
            // No user found with that email
            $session->setFlashdata('error', 'Email not found');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        // Destroy all session data and redirect to login page
        session()->destroy();
        return redirect()->to('/login');
    }
}
