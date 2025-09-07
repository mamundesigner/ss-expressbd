<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate inputs
    if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid input. Please check your form.";
        exit;
    }

    // Recipient email (change this to your email address)
    $to = "mamunrashid57@gmail.com";

    // Subject
    $subject = "New Contact Form Submission from $name";

    // Email body
    $body = "You have received a new message from your website contact form.\n\n";
    $body .= "Here are the details:\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    // Headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Sorry, something went wrong. Please try again.";
    }
}
?>


