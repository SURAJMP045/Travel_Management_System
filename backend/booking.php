<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tourid = $_POST['tourid'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $departdate = $_POST['departdate'];
    $returndate = $_POST['returndate'];
    $pickaddress = $_POST['pickaddress'];
    $dropaddress = $_POST['dropaddress'];
    $vehicletype = $_POST['vehicletype'];
    $passengers = $_POST['passengers'];
    $addmessage = $_POST['addmessage'];
    $sql = "INSERT INTO booking (tourid, username, email, phone, departdate, returndate, pickaddress, dropaddress, vehicletype, passengers, addmessage) VALUES ('$tourid', '$username', '$email', '$phone', '$departdate', '$returndate', '$pickaddress', '$dropaddress', '$vehicletype', '$passengers', '$addmessage')";
    if ($conn_travel->query($sql) === TRUE) {
        echo "Booking submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn_travel->error;
    }
}
$conn_travel->close();
?>