<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = strip_tags(trim($_POST["name"]));
    $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = strip_tags(trim($_POST["message"]));

    $to = "sasikumarassociate@gmail.com"; // Change to your email
    $email_subject = "Contact Form: " . $subject;

    $email_body = "New message from contact form:\n\n" .
                  "Name: $name\n" .
                  "Email: $email\n" .
                  "Subject: $subject\n" .
                  "Message:\n$message\n";

    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<div class='alert alert-success'>✅ Message sent successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>❌ Message could not be sent. Please try again.</div>";
    }
} else {
    echo "<div class='alert alert-warning'>⚠ Invalid request.</div>";
}
?>
