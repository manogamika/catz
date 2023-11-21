<?php
$conn = new mysqli("localhost", "username", "password", "table");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, message, created_at FROM messages ORDER BY created_at DESC LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p> " . $row["message"] ."</p>";
    }
}

$conn->close();
?>
