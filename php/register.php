<?php
include("db_connect.php"); // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Secure password

    // Check if the username or email already exists
    $checkQuery = "SELECT * FROM users WHERE email='$email' OR username='$username'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "<script>alert('Email or Username already exists!');</script>";
    } else {
        // Insert new user
        $sql = "INSERT INTO users (name, email, username, password) VALUES ('$name', '$email', '$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('User registered successfully!'); window.location='login.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            background: url('images/wood-bg.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
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
    <div class="register-container">
        <h2>Register</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Full Name" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
