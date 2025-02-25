<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Sanitize input to prevent XSS or SQL injection
    $name = htmlspecialchars(strip_tags($name));
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags($message));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "invalid_email";
        exit();
    }

    // Handle message sending logic (e.g., via email or storing in database)
    $to = "st10103122@rcconnect.edu.za"; // Your foundation email
    $subject = "New Contact Message from $name";
    $body = "You have received a new message from $name ($email):\n\n$message";
    $headers = "From: $email";

    // Send email and return response
    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>