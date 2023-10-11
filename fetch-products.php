<?php
// Database connection
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "TourismDB"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve products from the database
$sql = "SELECT * FROM Products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['product_name']}</td>
                <td>{$row['description']}</td>
                <td>{$row['price']}</td>
                
            </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No products found.</td></tr>";
}

$conn->close();
?>