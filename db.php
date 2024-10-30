<?php
$conn_travel = mysqli_connect("localhost", "root", "", "travel");
if (!$conn_travel) {
    die("Connection to 'travel' database failed: " . mysqli_connect_error());
}
?>