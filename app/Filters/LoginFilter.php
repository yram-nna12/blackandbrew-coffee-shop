<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Get the current session instance
        $session = session();

        // If the user is not logged in (no 'isLoggedIn' flag in session)
        if (! $session->get('isLoggedIn')) {
            // Redirect unauthenticated user to the login page
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No actions needed after the response for this filter
    }
}
