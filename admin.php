<?php
session_start();
include("db.php"); // Assuming db.php contains database connection details

// Fetch user data from the register table
$sql = "SELECT * FROM register";
$result = $conn_travel->query($sql);

// Delete user logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteUser'])) {
    $usernameToDelete = $_POST['deleteUser'];

    // Construct SQL DELETE query
    $deleteSql = "DELETE FROM register WHERE username = ?";

    // Prepare and bind parameters
    $stmt = $conn_travel->prepare($deleteSql);
    $stmt->bind_param("s", $usernameToDelete);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect back to the page after deletion
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        // Handle error
        echo "Error deleting user: " . $conn_travel->error;
    }
}

// Add user logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addUser'])) {
    $username = $_POST["newUsername"];
    $email = $_POST["newEmail"];
    $password = $_POST["newPassword"]; // You should hash the password before storing it

    // Construct SQL INSERT query
    $addSql = "INSERT INTO register (username, email, password) VALUES (?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn_travel->prepare($addSql);
    $stmt->bind_param("sss", $username, $email, $password);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect back to the page after addition
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        // Handle error
        echo "Error adding user: " . $conn_travel->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        /* Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        .user-action {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }

    </style>
</head>
<body>
    <!-- User Management Table -->
    <h2>User Management</h2>
    <table>
        <!-- Table Header -->
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <!-- Table Body -->
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["password"] . "</td>";
                    echo "<td>
                            <button onclick=\"editUser('" . $row["username"] . "')\">Edit</button>
                            <button onclick=\"deleteUser('" . $row["username"] . "')\">Delete</button>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No users found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Add User Form -->
    <h2>Add New User</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="newUsername">Username:</label>
        <input type="text" id="newUsername" name="newUsername" required><br>
        <label for="newEmail">Email:</label>
        <input type="email" id="newEmail" name="newEmail" required><br>
        <label for="newPassword">Password:</label>
        <input type="password" id="newPassword" name="newPassword" required><br>
        <button type="submit" name="addUser">Add User</button>
    </form>

    <!-- JavaScript for user deletion and edition -->
    <script>
        function deleteUser(username) {
            if (confirm("Are you sure you want to delete this user?")) {
                // Create a form to submit the username for deletion
                var form = document.createElement("form");
                form.setAttribute("method", "post");
                form.setAttribute("action", "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>");

                // Create a hidden input field to hold the username
                var input = document.createElement("input");
                input.setAttribute("type", "hidden");
                input.setAttribute("name", "deleteUser");
                input.setAttribute("value", username);
                
                // Append the input field to the form
                form.appendChild(input);

                // Append the form to the document and submit it
                document.body.appendChild(form);
                form.submit();
            }
        }
        
        function editUser(username) {
            // Implement logic to edit user with username
        }
    </script>
</body>
</html>

<?php
if (isset($conn_travel)) {
    $conn_travel->close();
}
?>

