<?php
session_start();
session_destroy(); // Destroy all sessions
echo "<script>alert('You have logged out!'); window.location='login.php';</script>";
exit();
?>
