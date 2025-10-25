<?php
require_once 'sendmailfunction.php';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input data
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone_number = isset($_POST['phone_number']) ? trim($_POST['phone_number']) : '';
    $service = isset($_POST['service']) ? trim($_POST['service']) : '';
    $project_description = isset($_POST['project_description']) ? trim($_POST['project_description']) : '';
    
    // Basic validation
    $errors = [];
    
    if (empty($name)) {
        $errors[] = 'Name is required';
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required';
    }
    
    if (empty($phone_number)) {
        $errors[] = 'Phone number is required';
    }
    
    if (empty($service)) {
        $errors[] = 'Service selection is required';
    }
    
    if (empty($project_description)) {
        $errors[] = 'Project description is required';
    }
    
    // If there are validation errors, return them
    if (!empty($errors)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
        exit;
    }
    
    // Prepare email content
    $to = 'info@websital.com';
    $subject = 'New Contact Form Submission - ' . $service;
    
    // Create HTML email body
    $message = "
    <html>
    <head>
        <title>New Contact Form Submission</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background-color: #0E0F11; color: white; padding: 20px; text-align: center; }
            .content { background-color: #f9f9f9; padding: 20px; }
            .field { margin-bottom: 15px; }
            .label { font-weight: bold; color: #0E0F11; }
            .value { margin-top: 5px; }
            .footer { background-color: #0E0F11; color: white; padding: 15px; text-align: center; font-size: 12px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Contact Form Submission</h2>
                <p>Websital Contact Form</p>
            </div>
            <div class='content'>
                <div class='field'>
                    <div class='label'>Full Name:</div>
                    <div class='value'>" . htmlspecialchars($name) . "</div>
                </div>
                <div class='field'>
                    <div class='label'>Email:</div>
                    <div class='value'>" . htmlspecialchars($email) . "</div>
                </div>
                <div class='field'>
                    <div class='label'>Phone Number:</div>
                    <div class='value'>" . htmlspecialchars($phone_number) . "</div>
                </div>
                <div class='field'>
                    <div class='label'>Service:</div>
                    <div class='value'>" . htmlspecialchars($service) . "</div>
                </div>
                <div class='field'>
                    <div class='label'>Project Description:</div>
                    <div class='value'>" . nl2br(htmlspecialchars($project_description)) . "</div>
                </div>
            </div>
            <div class='footer'>
                <p>This email was sent from the Websital contact form.</p>
                <p>Submitted on: " . date('Y-m-d H:i:s') . "</p>
            </div>
        </div>
    </body>
    </html>";
    
    // Send email using the existing function
    $success = sendemailsmtp($to, $message, $subject, $email, $name);
    
    if ($success) {
        // Return success response
        echo json_encode(['success' => true, 'message' => 'Thank you! Your message has been sent successfully. We will get back to you soon.']);
    } else {
        // Return error response
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Sorry, there was an error sending your message. Please try again later.']);
    }
} else {
    // If not POST request, redirect to contact page
    header('Location: ../contact-us.php');
    exit;
}
?>