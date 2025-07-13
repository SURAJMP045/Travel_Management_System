<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = "surajmp";
    $admin_password = "surajsonu@123";
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION["admin"] = true; 
        header("Location: adminpanel.html"); 
        exit();
    } else {
        $error_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f1f1f1;
        background-image: url("Vietnam.jpg");
        background-size: cover;
    }
    
    .login-container {
        background-color: #fff;
        padding: 20px;
        width: 300px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .form-group {
        margin-bottom: 15px;
    }
    
    label {
        display: block;
        margin-bottom: 5px;
    }
    
    input[type="text"],
    input[type="password"] {
        width: 94%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }
    
    .btn {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        text-decoration: none;
    }
    
    .btn:hover {
        background-color: #0056b3;
        transition: background-color 0.3s ease;
    }
    
    .error-message {
        color: #ff0000;
        margin-top: 10px;
    }

    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if(isset($error_message)): ?>
            <div class="error-message"><?= $error_message ?></div>
        <?php endif; ?>
        <form id="login-form" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button class="btn" type="submit">Login</button>
        </form>
    </div>
</body>
</html>
