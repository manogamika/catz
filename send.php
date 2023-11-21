<?php
$conn = new mysqli("localhost", "username", "password", "table");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$message = $_POST["message"];
$message = $conn->real_escape_string($message);
$sql = "INSERT INTO messages (message) VALUES ('$message')";
$conn->query($sql);
$conn->close();
?>
