<?php
$conn = new mysqli("localhost", "root", "", "userDB");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
