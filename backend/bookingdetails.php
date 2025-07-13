<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <style>
        table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

    </style>
</head>
<body>
    <h2>Booking Details</h2>
    <?php
    session_start();
    include("db.php");
    $sql = "SELECT * FROM booking";
    $result = $conn_travel->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Tour ID</th><th>Username</th><th>Email</th><th>Phone</th><th>Departure Date</th><th>Return Date</th><th>Pick Address</th><th>Drop Address</th><th>Vehicle Type</th><th>Passengers</th><th>Additional Message</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["tourid"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["departdate"] . "</td>";
            echo "<td>" . $row["returndate"] . "</td>";
            echo "<td>" . $row["pickaddress"] . "</td>";
            echo "<td>" . $row["dropaddress"] . "</td>";
            echo "<td>" . $row["vehicletype"] . "</td>";
            echo "<td>" . $row["passengers"] . "</td>";
            echo "<td>" . $row["addmessage"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No booking details available.";
    }
    if (isset($conn_travel)) {
        $conn_travel->close();
    }
    ?>
</body>
</html>
