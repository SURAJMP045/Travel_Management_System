<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = isset($_POST["rating"]) ? $_POST["rating"] : null;

    // Perform further processing or database insertion here
    // For now, let's just print the selected rating
    echo "You rated us: $rating";
} else {
    // Redirect to the form page if accessed directly
    header("Location: index.html");
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // You can perform further processing here (e.g., send an email, store in a database)

    // For demonstration purposes, just echo a confirmation message
    echo "Thank you, $name! Your message has been received.";
} else {
    // Redirect to the form page if accessed directly
    header("Location: index.html");
}
?>
