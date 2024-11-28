<?php
require 'classes/Database.php';
require 'classes/User.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$db = (new Database())->connect();
$user = new User($db);

$currentUser = $user->getUserById($_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = !empty($_POST['password']) ? $_POST['password'] : null;

    if ($user->updateProfile($_SESSION['user_id'], $username, $email, $password)) {
        header('Location: profile.php?message=Profile updated successfully.');
        exit;
    } else {
        $error = 'Failed to update profile.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
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

    <h1>Profile</h1>
    <?php if (isset($error)): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>
    <?php if (isset($_GET['message'])): ?>
        <div class="success"><?= $_GET['message'] ?></div>
    <?php endif; ?>
    <form method="POST">
        <label>Username: <input type="text" name="username" value="<?= htmlspecialchars($currentUser['username']) ?>"></label><br>
        <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($currentUser['email']) ?>"></label><br>
        <label>Password (Leave blank to keep current): <input type="password" name="password"></label><br>
        <button type="submit">Update Profile</button>
    </form>
    <a href="logout.php">Logout</a>
</body>
</html>
