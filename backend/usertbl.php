<?php
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}
?>