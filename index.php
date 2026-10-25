<?php
// Name: Misael Diaz
// Date: 10/24/2026
// Project: Building a Dynamic Form with PHP
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Building a Dynamic Form with PHP</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <main class="container">
        <h1>Building a Dynamic Form with PHP</h1>
        <p>Name: Misael Diaz</p>
        <p>Date: October 24, 2026</p>

        <h2>Contact Form</h2>
        
        <form action="confirm.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </main>
</body>
</html>