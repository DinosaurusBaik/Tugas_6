<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Email Yang Harus Digunakan
    $valid_email = 'user@example.com';
    $valid_password = 'password123';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === $valid_email && $password === $valid_password) {

        $_SESSION['user'] = $email;
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <div class="wrapper">
        <div class="form-box login">
            <h2>Login</h2>
            <form method="POST" action="login.php">
                <div class="input-box">
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
