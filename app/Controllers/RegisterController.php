<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        // Load form helper for form-related functions
        helper(['form']);

        // Show registration view
        echo view('register');
    }

    public function store()
    {
        // Load form helper again (for validation, etc.)
        helper(['form']);

        // Validation rules for registration form
        $rules = [
            'first_name'       => 'required|min_length[2]',                 // first name required, min 2 chars
            'last_name'        => 'required|min_length[2]',                 // last name required, min 2 chars
            'email'            => 'required|valid_email|is_unique[users.email]', // unique, valid email
            'password'         => 'required|min_length[6]',                 // password required, min 6 chars
            'confirm_password' => 'matches[password]',                      // must match password
        ];

        // If validation fails, reload register view with errors
        if (!$this->validate($rules)) {
            return view('register', [
                'validation' => $this->validator // pass validator object to view
            ]);
        }

        // Use UserModel to interact with users table
        $userModel = new UserModel();

        // Prepare data to insert (password is hashed)
        $data = [
            'first_name' => $this->request->getVar('first_name'),
            'last_name'  => $this->request->getVar('last_name'),
            'email'      => $this->request->getVar('email'),
            'password'   => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role'       => 'customer' // default role for new registrations
        ];

        // Insert new user record into database
        $userModel->save($data);

        // Redirect to login page with success flash message
        return redirect()->to('/login')->with('success', 'Registration successful! You can now log in.');
    }
}
