<?php
require_once 'connection.php'; // Adjust path if needed

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate input
    if (empty($email) || empty($message)) {
        echo "<script>alert('Email and message are required.'); window.location.href='contact.html';</script>";
        exit();
    }

    // Prepare and execute SQL query
    $stmt = $conn->prepare("INSERT INTO messages (userEmail, userMessage) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $message);

    if ($stmt->execute()) {
        echo "<script>alert('Message sent successfully.'); window.location.href='contact.html';</script>";
    } else {
        echo "<script>alert('Error: Unable to send message.'); window.location.href='contact.html';</script>";
    }

    $stmt->close();
    $conn->close();
}
