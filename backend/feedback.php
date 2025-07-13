<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $rating = $_POST["rating"];
    $message = $_POST["Message"];

    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO feedback (username, email, rating, message) VALUES ('$username', '$email', '$rating', '$message')";

    // Execute the SQL statement
    if ($conn_travel->query($sql) === TRUE) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn_travel->error;
    }

    // Close the database connection
    $conn_travel->close();
}
?>
