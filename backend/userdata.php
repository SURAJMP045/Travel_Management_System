<?php
$servername = "localhost";
$username = "username";
$password = "password"; 
$database = "travel";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to add a new user
function addUser($conn, $username, $email, $password) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hashing the password
    $sql = "INSERT INTO register (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
    if ($conn->query($sql) === TRUE) {
        echo "New user added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to delete a user
function deleteUser($conn, $username) {
    $sql = "DELETE FROM register WHERE username='$username'";
    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Function to update user's email
function updateUserEmail($conn, $username, $new_email) {
    $sql = "UPDATE register SET email='$new_email' WHERE username='$username'";
    if ($conn->query($sql) === TRUE) {
        echo "User's email updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Fetch users from the database
$sql = "SELECT username, email, password FROM register";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Username: " . $row["username"]. " - Email: " . $row["email"]. " - Password: " . $row["password"]. "<br>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
