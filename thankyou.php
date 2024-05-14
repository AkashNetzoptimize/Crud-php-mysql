<?php
include_once 'function.php';
include_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .thank-you-container {
            max-width: 600px;
            margin: auto;
            padding-top: 100px;
        }
        .thank-you-text {
            font-size: 24px;
            text-align: center;
            margin-bottom: 30px;
        }
        .btn-back-home {
            display: block;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="thank-you-container">
        <div class="thank-you-text">
            <p>Thank you for your submission!</p>
            <p>We appreciate your interest.</p>
        </div>
        <a href="login.php" class="btn btn-primary btn-back-home">Go to Login form</a>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
