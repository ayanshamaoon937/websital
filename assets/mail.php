<?php
declare(strict_types=1);

// Basic email handler for contact form
// Expects POST: name, email, subject, service, message

header('X-Content-Type-Options: nosniff');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Method Not Allowed';
    exit;
}

// Helper to fetch and sanitize input
$get = static function (string $key): string {
    return isset($_POST[$key]) ? trim((string)$_POST[$key]) : '';
};

$name = $get('name');
$email = $get('email');
$subject = $get('subject');
$service = $get('service');
$message = $get('message');

// Validate required fields
if ($name === '' || $email === '' || $subject === '' || $service === '' || $message === '') {
    http_response_code(422);
    echo 'Please complete all required fields.';
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    echo 'Please provide a valid email address.';
    exit;
}

// Prepare email
$to = 'websital@consultant.com';
$safeSubject = 'Contact Form: ' . preg_replace('/[\r\n]+/', ' ', $subject);

$bodyLines = [
    'You received a new contact form submission from Websital:',
    '',
    'Name: ' . $name,
    'Email: ' . $email,
    'Service: ' . $service,
    'Subject: ' . $subject,
    '',
    'Message:',
    $message,
    '',
    '— End of message —',
];

$body = implode("\r\n", $bodyLines);

// SMTP configuration (mail.com over SSL/TLS)
$smtpHost = 'smtp.mail.com';
$smtpPort = 465; // 465 = SMTPS (implicit SSL)
$smtpUser = 'websital@consultant.com';
$smtpPass = 'Qwertydvork1$';
$fromEmail = $smtpUser;
$fromName = 'Websital';

// Build full message with headers for SMTP DATA
$headers = [];
$headers[] = 'From: ' . sprintf('%s <%s>', $fromName, $fromEmail);
$headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-Type: text/plain; charset=UTF-8';
$headers[] = 'X-Mailer: websital-contact/1.0';

$data = implode("\r\n", [
    'Subject: ' . $safeSubject,
    'To: ' . $to,
    implode("\r\n", $headers),
    '',
    $body
]);

$sendResult = smtp_send_mail_ssl($smtpHost, $smtpPort, $smtpUser, $smtpPass, $fromEmail, [$to], $data);

if ($sendResult !== true) {
    // Fallback to STARTTLS on 587 if SSL failed
    $fallback = smtp_send_mail_starttls($smtpHost, 587, $smtpUser, $smtpPass, $fromEmail, [$to], $data);
    if ($fallback === true) {
        http_response_code(200);
        echo 'Thank you! Your message has been sent.';
        exit;
    }

    http_response_code(500);
    $hint = is_string($sendResult) ? $sendResult : 'smtp_ssl_unknown_error';
    $fhint = is_string($fallback) ? $fallback : 'smtp_starttls_unknown_error';
    echo 'Send failed (' . $hint . ', ' . $fhint . '). Please check SMTP/SSL, credentials, firewall, and that SMTP is enabled on your account.';
    exit;
}

http_response_code(200);
echo 'Thank you! Your message has been sent.';

exit;

// --- Helpers ---
/**
 * Send email via SMTPS (implicit SSL) using a minimal SMTP client.
 * $data must contain headers + blank line + body.
 */
function smtp_send_mail_ssl(string $host, int $port, string $username, string $password, string $from, array $recipients, string $data)
{
    $errno = 0;
    $errstr = '';
    $timeout = 15;
    $stream = @stream_socket_client('ssl://' . $host . ':' . $port, $errno, $errstr, $timeout, STREAM_CLIENT_CONNECT);
    if (!$stream) {
        return 'connect_failed';
    }

    stream_set_timeout($stream, $timeout);

    $expect = function($code) use ($stream) {
        $line = '';
        while (($resp = fgets($stream, 515)) !== false) {
            $line .= $resp;
            if (preg_match('/^([0-9]{3})[\s-]/', $resp, $m)) {
                if ($resp[3] === ' ') break; // last line
            }
        }
        if (!preg_match('/^' . $code . '/', $line)) {
            return $line ?: false;
        }
        return true;
    };

    $write = function($cmd) use ($stream) {
        return fwrite($stream, $cmd . "\r\n") !== false;
    };

    // Greet
    if ($expect('220') !== true) { fclose($stream); return 'banner_failed'; }
    if (!$write('EHLO websital.local')) { fclose($stream); return 'ehlo_write_failed'; }
    if ($expect('250') !== true) { fclose($stream); return 'ehlo_failed'; }

    // AUTH LOGIN
    if (!$write('AUTH LOGIN')) { fclose($stream); return 'auth_write_failed'; }
    if ($expect('334') !== true) { fclose($stream); return 'auth_challenge_failed'; }
    if (!$write(base64_encode($username))) { fclose($stream); return 'user_write_failed'; }
    if ($expect('334') !== true) { fclose($stream); return 'user_reject'; }
    if (!$write(base64_encode($password))) { fclose($stream); return 'pass_write_failed'; }
    if ($expect('235') !== true) { fclose($stream); return 'auth_failed'; }

    // MAIL FROM
    if (!$write('MAIL FROM: <' . $from . '>')) { fclose($stream); return 'mail_from_write_failed'; }
    if ($expect('250') !== true) { fclose($stream); return 'mail_from_failed'; }

    // RCPT TO
    foreach ($recipients as $rcpt) {
        if (!$write('RCPT TO: <' . $rcpt . '>')) { fclose($stream); return 'rcpt_to_write_failed'; }
        if ($expect('250') !== true) { fclose($stream); return 'rcpt_to_failed'; }
    }

    // DATA
    if (!$write('DATA')) { fclose($stream); return 'data_write_failed'; }
    if ($expect('354') !== true) { fclose($stream); return 'data_failed'; }
    // End data with \r\n.\r\n per RFC
    $payload = $data;
    // Dot-stuffing
    $payload = preg_replace('/\r\n\./', "\r\n..", $payload);
    if (!fwrite($stream, $payload . "\r\n.\r\n")) { fclose($stream); return 'data_send_failed'; }
    if ($expect('250') !== true) { fclose($stream); return 'data_not_accepted'; }

    // QUIT
    $write('QUIT');
    fclose($stream);
    return true;
}

/**
 * Send email via SMTP with STARTTLS (explicit TLS on port 587)
 */
function smtp_send_mail_starttls(string $host, int $port, string $username, string $password, string $from, array $recipients, string $data)
{
    $errno = 0;
    $errstr = '';
    $timeout = 15;
    $stream = @stream_socket_client('tcp://' . $host . ':' . $port, $errno, $errstr, $timeout, STREAM_CLIENT_CONNECT);
    if (!$stream) {
        return 'connect_failed';
    }
    stream_set_timeout($stream, $timeout);

    $expect = function($code) use ($stream) {
        $line = '';
        while (($resp = fgets($stream, 515)) !== false) {
            $line .= $resp;
            if (preg_match('/^([0-9]{3})[\s-]/', $resp, $m)) {
                if ($resp[3] === ' ') break;
            }
        }
        if (!preg_match('/^' . $code . '/', $line)) {
            return $line ?: false;
        }
        return true;
    };

    $write = function($cmd) use ($stream) {
        return fwrite($stream, $cmd . "\r\n") !== false;
    };

    if ($expect('220') !== true) { fclose($stream); return 'banner_failed'; }
    if (!$write('EHLO websital.local')) { fclose($stream); return 'ehlo_write_failed'; }
    if ($expect('250') !== true) { fclose($stream); return 'ehlo_failed'; }

    // STARTTLS
    if (!$write('STARTTLS')) { fclose($stream); return 'starttls_write_failed'; }
    if ($expect('220') !== true) { fclose($stream); return 'starttls_failed'; }
    if (!stream_socket_enable_crypto($stream, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) { fclose($stream); return 'tls_enable_failed'; }

    // Re-EHLO after TLS
    if (!$write('EHLO websital.local')) { fclose($stream); return 'ehlo2_write_failed'; }
    if ($expect('250') !== true) { fclose($stream); return 'ehlo2_failed'; }

    // AUTH LOGIN
    if (!$write('AUTH LOGIN')) { fclose($stream); return 'auth_write_failed'; }
    if ($expect('334') !== true) { fclose($stream); return 'auth_challenge_failed'; }
    if (!$write(base64_encode($username))) { fclose($stream); return 'user_write_failed'; }
    if ($expect('334') !== true) { fclose($stream); return 'user_reject'; }
    if (!$write(base64_encode($password))) { fclose($stream); return 'pass_write_failed'; }
    if ($expect('235') !== true) { fclose($stream); return 'auth_failed'; }

    // MAIL FROM / RCPT TO / DATA sequence
    if (!$write('MAIL FROM: <' . $from . '>')) { fclose($stream); return 'mail_from_write_failed'; }
    if ($expect('250') !== true) { fclose($stream); return 'mail_from_failed'; }

    foreach ($recipients as $rcpt) {
        if (!$write('RCPT TO: <' . $rcpt . '>')) { fclose($stream); return 'rcpt_to_write_failed'; }
        if ($expect('250') !== true) { fclose($stream); return 'rcpt_to_failed'; }
    }

    if (!$write('DATA')) { fclose($stream); return 'data_write_failed'; }
    if ($expect('354') !== true) { fclose($stream); return 'data_failed'; }

    $payload = preg_replace('/\r\n\./', "\r\n..", $data);
    if (!fwrite($stream, $payload . "\r\n.\r\n")) { fclose($stream); return 'data_send_failed'; }
    if ($expect('250') !== true) { fclose($stream); return 'data_not_accepted'; }

    $write('QUIT');
    fclose($stream);
    return true;
}
