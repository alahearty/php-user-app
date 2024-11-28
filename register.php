<?php
require 'classes/Database.php';
require 'classes/User.php';

$db = (new Database())->connect();
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors = [];

    if (empty($username) || empty($email) || empty($password)) {
        $errors[] = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format.';
    } elseif (strlen($password) < 6) {
        $errors[] = 'Password must be at least 6 characters long.';
    } else {
        if ($user->register($username, $email, $password)) {
            header('Location: login.php?message=Registration successful.');
            exit;
        } else {
            $errors[] = 'Failed to register. Email might already be taken.';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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

    <h1>Register</h1>
    <?php if (!empty($errors)): ?>
        <div class="error">
            <?php foreach ($errors as $error) echo "<p>$error</p>"; ?>
        </div>
    <?php endif; ?>
    <form method="POST">
        <label>Username: <input type="text" name="username"></label><br>
        <label>Email: <input type="email" name="email"></label><br>
        <label>Password: <input type="password" name="password"></label><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
