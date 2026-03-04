<?php
session_start();
include '../includes/db_connect.php';

$error = '';

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_username'] = $username;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No user found with that username.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Analytics Fusion Lab</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            background-color: var(--bg-light);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-card {
            background: white;
            padding: 40px;
            border-radius: var(--border-radius-md);
            box-shadow: var(--box-shadow);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-input {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius-sm);
            font-family: inherit;
            font-size: 1rem;
        }

        .login-input:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .logo-text {
            font-size: 2rem;
            font-family: var(--font-heading);
            color: var(--primary-color);
            font-weight: 800;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <img src="../assets/images/logo.png" alt="Analytics Fusion Lab Logo"
            style="height: 60px; border-radius: 50%; margin: 0 auto 15px; display: block;">
        <div class="logo-text">Analytics Fusion Lab Admin</div>
        <p style="color: var(--text-light); margin-bottom: 30px;">Sign in to manage your website</p>

        <?php if ($error): ?>
            <div
                style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px; font-size: 0.9rem;">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="text" name="username" class="login-input" placeholder="Username" required value="admin">
            <input type="password" name="password" class="login-input" placeholder="Password" required
                value="password123">
            <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
        </form>

        <p style="margin-top: 20px; font-size: 0.8rem; color: var(--text-light);"><a href="../index.php"
                style="color: var(--primary-color);">← Back to Website</a></p>
    </div>

</body>

</html>