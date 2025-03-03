<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Email validation
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set the recipient's email address
        $to = "recipient@example.com"; // Replace with the recipient's email address

        // Create the email content
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n";
        $email_content .= "Subject: $subject\n";
        $email_content .= "Message:\n$message\n";

        // Set the email headers
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Send the email
        if (mail($to, $subject, $email_content, $headers)) {
            echo "Your message has been sent successfully.";
        } else {
            echo "There was an error sending your message. Please try again later.";
        }
    } else {
        echo "Invalid email address.";
    }
}
?>
