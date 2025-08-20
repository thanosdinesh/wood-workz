<?php
session_start();
include("db_connect.php"); // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the username exists
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user["password"])) {
            $_SESSION["username"] = $username;
            echo "<script>alert('Login successful!'); window.location='dashboard.php';</script>";
        } else {
            echo "<script>alert('Invalid password');</script>";
        }
    } else {
        echo "<script>alert('User not found');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background: url("C:\xampp\htdocs\login-system\images\img2.jpg") no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.2); /* Transparent White */
            padding: 20px;
            border-radius: 10px;
            backdrop-filter: blur(10px); /* Glass Effect */
            text-align: center;
            width: 300px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        h2 {
            color: white;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #8B4513; /* Brown color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #A0522D;
        }

        p {
            color: white;
        }

        a {
            color: #FFD700;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>
