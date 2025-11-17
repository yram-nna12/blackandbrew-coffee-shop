<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    // Email address used as sender
    public string $fromEmail  = 'brewblack46@gmail.com';

    // Sender name shown in email clients
    public string $fromName   = 'Brew Black Website';

    // Email protocol used for sending
    public string $protocol   = 'smtp';

    // SMTP server host (Gmail)
    public string $SMTPHost   = 'smtp.gmail.com';

    // Gmail account used for sending emails
    public string $SMTPUser   = 'brewblack46@gmail.com';

    // App password generated from Google (not the Gmail login password)
    public string $SMTPPass   = 'gqsdyvtywdeltxnk';

    // SMTP port for TLS
    public int    $SMTPPort   = 587;

    // Type of encryption used (TLS is required for port 587)
    public string $SMTPCrypto = 'tls';

    // Email formatting type ('text' or 'html')
    public string $mailType   = 'html';

    // Email character encoding
    public string $charset    = 'UTF-8';

    // Newline characters for headers
    public string $newline    = "\r\n";

    // CRLF (Carriage Return + Line Feed)
    public string $CRLF       = "\r\n";

    // SMTP timeout in seconds
    public int    $SMTPTimeout = 10;
}
