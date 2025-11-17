<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;

class ContactController extends Controller
{
    public function index()
    {
        // Get current session instance
        $session = session();

        // Try to get logged-in user's email, default to empty string if not set
        $userEmail = $session->get('email') ?? '';

        // Pass userEmail to the contact view (for pre-filling email field)
        return view('contact', ['userEmail' => $userEmail]);
    }

    public function send()
    {
        // Load form and URL helpers
        helper(['form', 'url']);

        // Basic validation rules for contact form
        $rules = [
            'subject' => 'required|min_length[3]',
            'email'   => 'required|valid_email',
            'message' => 'required|min_length[5]',
        ];

        // If validation fails, return JSON with error messages + new CSRF token
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors(),
                'csrf'   => csrf_hash(),
            ]);
        }

        // Get validated form data
        $subject = $this->request->getPost('subject');
        $from    = $this->request->getPost('email');
        $message = $this->request->getPost('message');

        // Get CI4 email service instance
        $email = Services::email();
        $email->setMailType('html'); // Force HTML format

        // ========== EMAIL TO ADMIN ==========
        $email->setFrom('brewblack46@gmail.com', 'Brew Black Website'); // Sender (website)
        $email->setTo('brewblack46@gmail.com');                          // Admin email
        $email->setReplyTo($from);                                       // Reply goes to user
        $email->setSubject($subject);

        // Main message body to admin, escape user message and keep line breaks
        $email->setMessage("
            <p><strong>From:</strong> {$from}</p>
            <p><strong>Subject:</strong> {$subject}</p>
            <p><strong>Message:</strong><br>" . nl2br(esc($message)) . "</p>
        ");

        // Try sending email to admin
        if (!$email->send(false)) {
            // Get debug info if sending fails
            $debug = $email->printDebugger(['headers', 'subject', 'body']);

            // Log error in CI log file
            log_message('error', 'Email send failed: ' . $debug);

            // Return JSON error response to frontend + new CSRF
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Failed to send message. Please check your email settings.',
                'debug'   => $debug,
                'csrf'    => csrf_hash(),
            ]);
        }

        // ========== CONFIRMATION EMAIL TO SENDER ==========
        $email->clear();              // Clear previous email settings
        $email->setMailType('html');  // Ensure still HTML
        $email->setFrom('brewblack46@gmail.com', 'Brew Black Team');
        $email->setTo($from);         // Send back to user
        $email->setSubject('We received your message!');
        $email->setMessage("
            <p>Hi there,</p>
            <p>Thanks for reaching out! We’ve received your message and our team will get back to you soon.</p>
            <hr>
            <p><strong>Your Message:</strong><br>" . nl2br(esc($message)) . "</p>
            <p>– The Brew Black Team</p>
        ");
        $email->send();               // No need to check; main send already succeeded

        // Final JSON success response for the frontend + refreshed CSRF token
        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Your message has been sent successfully!',
            'csrf'    => csrf_hash(),
        ]);
    }
}
