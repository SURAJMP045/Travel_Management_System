<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>
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
    <h2>Contact Messages</h2>
    <?php
    session_start();
    include("db.php");
    $sql = "SELECT * FROM contact";
    $result = $conn_travel->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Username</th><th>Email</th><th>Message</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["message"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No messages available.";
    }
    if (isset($conn_travel)) {
        $conn_travel->close();
    }
    ?>
</body>
</html>
