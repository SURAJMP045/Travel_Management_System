<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $check_query = "SELECT * FROM register WHERE username = ? OR email = ?";
    $check_stmt = mysqli_prepare($conn_travel, $check_query);

    if ($check_stmt) {
        mysqli_stmt_bind_param($check_stmt, "ss", $username, $email);
        mysqli_stmt_execute($check_stmt);
        mysqli_stmt_store_result($check_stmt);

        if (mysqli_stmt_num_rows($check_stmt) > 0) {
            $select_query = "SELECT password FROM register WHERE username = ? OR email = ?";
            $select_stmt = mysqli_prepare($conn_travel, $select_query);

            if ($select_stmt) {
                mysqli_stmt_bind_param($select_stmt, "ss", $username, $email);
                mysqli_stmt_execute($select_stmt);
                mysqli_stmt_bind_result($select_stmt, $hashed_password);
                mysqli_stmt_fetch($select_stmt);

                if (password_verify($password, $hashed_password)) {
                    // Password is correct, redirect to index.html
                    header("Location: index.html");
                    exit();
                } else {
                    echo "<script>alert('Incorrect password');</script>";
                }

                mysqli_stmt_close($select_stmt);
            } else {
                echo "<script>alert('Error in checking password');</script>";
            }
        } else {
            echo "<script>alert('Username or email not found. Please register.');</script>";
            header("Location: signup.php");
        }
        
        mysqli_stmt_close($check_stmt);
    } else {
        echo "<script>alert('Error in checking username/email');</script>";
    }
}
if ($conn_travel) {
    mysqli_close($conn_travel);
}
?>
