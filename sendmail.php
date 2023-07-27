<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Set up the recipient email address
  $recipient = 'dummymail@gmail.com';

  // Set up the email headers
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=utf-8\r\n";

  // Create the email message
  $email_message = "
  <html>
  <body>
    <h2>New Contact Form Submission</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Subject:</strong> $subject</p>
    <p><strong>Message:</strong> $message</p>
  </body>
  </html>
  ";

  // Send the email
  $success = mail($recipient, $subject, $email_message, $headers);

  if ($success) {
    // Send a success response to the client
    echo "success";
  } else {
    // Send an error response to the client
    echo "error";
  }
}
?>
