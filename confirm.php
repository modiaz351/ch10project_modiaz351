<?php
// Name: Misael Diaz
// Date: October 24, 2026
// Project: Building a Dynamic Form with PHP

// Create variables for the confirmation message.
$statusMessage = "";
$statusClass = "";
$name = "";
$email = "";
$message = "";

// Check if the form was submitted using POST.
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Store submitted information and remove extra spaces.
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $message = trim($_POST["message"] ?? "");

    // Sanitize the email address.
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Check for empty fields and validate the email.
    if (empty($name) || empty($email) || empty($message)) {
        $statusMessage = "Error: Please fill out all fields.";
        $statusClass = "error";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $statusMessage = "Error: Please enter a valid email address.";
        $statusClass = "error";
    } else {
        // Create a success message for valid information.
        $statusMessage = "Your form was submitted successfully!";
        $statusClass = "success";
    }
} else {
    // Display an error if the page is opened without submitting.
    $statusMessage = "Please submit the contact form first.";
    $statusClass = "error";
}

// Escape text before displaying it to prevent HTML injection.
function safeOutput($value) {
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Confirmation</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <main class="container">
        <h1>Building a Dynamic Form with PHP</h1>
        <p>Name: Misael Diaz</p>
        <p>Date: October 24, 2026</p>

        <h2>Form Confirmation</h2>

        <?php
        // Display the message using the correct CSS class.
        echo '<div class="' . $statusClass . '">';
        echo '<p>' . safeOutput($statusMessage) . '</p>';

        // Display submitted information when all fields are valid.
        if ($statusClass === "success") {
            echo '<p><strong>Name:</strong> ' . safeOutput($name) . '</p>';
            echo '<p><strong>Email:</strong> ' . safeOutput($email) . '</p>';
            echo '<p><strong>Message:</strong> ' .
                 nl2br(safeOutput($message)) . '</p>';
        }

        echo '</div>';
        ?>

        <p><a href="index.php">Return to Form</a></p>
    </main>
</body>
</html>
