<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Your Gmail email address
    $to = "your-email@gmail.com";
    
    // Create email headers
    $headers = "From: " . $name . " <" . $email . ">\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Subject and message
    $full_subject = "New message from your website: " . $subject;
    $full_message = "Name: " . $name . "\n";
    $full_message .= "Email: " . $email . "\n\n";
    $full_message .= "Message:\n" . $message . "\n";

    // Send the email
    if (mail($to, $full_subject, $full_message, $headers)) {
        // Redirect to a thank you page or display a success message
        echo "Message sent successfully!";
    } else {
        // Handle the error
        echo "There was a problem sending your message. Please try again later.";
    }
}
?>
