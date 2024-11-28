<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to User App</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<nav>
    <a href="index.php">Home</a>
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    <?php endif; ?>
</nav>

    <h1>Welcome to the User Management App</h1>
    <?php if (isset($_SESSION['user_id'])): ?>
        <p>You are logged in. <a href="profile.php">Manage your profile</a> or <a href="logout.php">Logout</a>.</p>
    <?php else: ?>
        <p>
            <a href="login.php">Login</a> or <a href="register.php">Register</a> to access the app.
        </p>
    <?php endif; ?>
</body>
</html>
