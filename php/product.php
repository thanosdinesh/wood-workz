<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Wood Workz</title>
    <link rel="stylesheet" href="D:\Word Workz 2\css\main.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>Wood Workz</h1>
        </div>
        <nav>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="products">
        <h2>Our Products</h2>

        <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='product'>";
                echo "<img src='" . $row["image"] . "' alt='" . $row["name"] . "'>";
                echo "<h3>" . $row["name"] . "</h3>";
                echo "<p>" . $row["description"] . "</p>";
                echo "<p>Price: $" . $row["price"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "No products found.";
        }
        $conn->close();
        ?>
    </section>

    <footer>
        <p>&copy; 2025 Wood Workz. All rights reserved.</p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
