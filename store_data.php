<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = array('username' => $username, 'email' => $email, 'password' => $password);
    $userDataJSON = json_encode($user) . "\n";
    $file = fopen("users.txt", "a");
    fwrite($file, $userDataJSON);
    fclose($file);
    header("Location: add_user.html");
    exit();
}
?>

