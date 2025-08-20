<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    echo "<script>alert('You must log in first!'); window.location='login.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>
    <p>This is your dashboard.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
