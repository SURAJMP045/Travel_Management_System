<?php
if (!is_null($users)) {
    foreach ($users as $user) {
        echo "Username: " . $user['username'] . "<br>";
    }
} else {
    echo "No users found.";
}
?>
