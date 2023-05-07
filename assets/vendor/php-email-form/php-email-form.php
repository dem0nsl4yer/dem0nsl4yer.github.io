<?php

// Replace with your email address
$receiving_email_address = 'your-email@example.com';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the form fields and sanitize them
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    // Create the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Subject: $subject\n";
    $email_message .= "Message:\n$message\n";

    // Set the email headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($receiving_email_address, $subject, $email_message, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
You can customize the email message and headers as per your requirements.






