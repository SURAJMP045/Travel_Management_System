<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pnumber = $_POST["pnumber"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    if ($password !== $confirmpassword) {
        echo "<script>alert('Password and confirm password do not match!');</script>";
        exit(); 
    }
    $check_query = "SELECT * FROM register WHERE email = '$email' OR username = '$username'";
    $check_result = mysqli_query($conn_travel, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('This username or email is already registered');</script>";
        header("Location: login.php");
        exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO register (firstname, lastname, username, email, pnumber, password) VALUES ('$firstname', '$lastname', '$username', '$email', '$pnumber', '$hashedPassword')";

    if (mysqli_query($conn_travel, $query)) {
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn_travel);
    }
} else {
    echo "Invalid request method";
}
?>
