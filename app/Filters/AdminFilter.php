<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Get the current session instance
        $session = session();

        // Check if user is NOT logged in OR logged in but not an admin
        if (! $session->get('isLoggedIn') || $session->get('role') !== 'admin') {
            // Store an error message in session (one-time display)
            $session->setFlashdata('error', 'Access denied. Admins only.');

            // Redirect non-admin or guest users to the login page
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No post-processing needed after the response for this filter
    }
}
