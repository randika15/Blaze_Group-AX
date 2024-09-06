<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "youremail@domain.com"; // Replace with your email address
    $subject = "New Contact Us Message from $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email\r\n";
    
    // Simulate email sending for demonstration purposes
    $email_sent = true; // Change to `false` to simulate an error

    // Simulate sending an email
    if ($email_sent) {
        echo "<script>alert('Thank you for your message, $name. We will respond to $email shortly.');</script>";
    } else {
        echo "<script>alert('There was an error sending your message. Please try again later.');</script>";
    }
}
?>
