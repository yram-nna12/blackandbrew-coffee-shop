<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Get current session instance
        $session = session();

        // Check if user is logged in (guard route)
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login with flash error message
            return redirect()->to('/login')->with('error', 'You must log in first');
        }

        // Simple manual session timeout check (2 hours = 7200 seconds)
        $loginTime = $session->get('login_time');   // Stored at login
        if ($loginTime && (time() - $loginTime > 7200)) {
            // If more than 2 hours passed, destroy session and force re-login
            $session->destroy();
            return redirect()->to('/login')->with('error', 'Session expired. Please log in again.');
        }

        // Pass all session data (user info, etc.) to the dashboard view
        $data['user'] = $session->get();

        // Load the dashboard view with user data
        return view('dashboard', $data);
    }
}
