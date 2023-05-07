<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);
    
    $recipient = "sgupt363@asu.edu"; // Replace with your own email address
    $email_subject = "New contact from $name: $subject";
    $email_body = "Name: $name\n\nEmail: $email\n\nMessage:\n$message";
    
    if (mail($recipient, $email_subject, $email_body)) {
        http_response_code(200);
        echo "Thank You! Your message has been sent.";
    } else {
        http_response_code(500);
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>