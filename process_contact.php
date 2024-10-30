<?php

session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Insert data into the 'contact' table
    $sql = "INSERT INTO contact (username, email, message) VALUES ('$username', '$email', '$message')";

    if ($conn_travel->query($sql) === TRUE) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn_travel->error;
    }

    // Close the database connection
    if (isset($conn_travel)) {
        $conn_travel->close();
    }
}
?>
