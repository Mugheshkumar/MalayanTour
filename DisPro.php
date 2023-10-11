<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Existing Products</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <!-- Include Header -->
    <?php include 'header.html'; ?>

    <!-- Include Navigation -->
    <?php include 'navigation.html'; ?>
    <?php include 'display-products.php'; ?>
    <!-- Display Existing Products Section -->
    <div class="container">
        <section>
            <h2>Existing Products</h2>

            <!-- Existing Products Table -->
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "tourismdb"; // Your database name

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve products from the database
            $sql = "SELECT * FROM Products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price (RM)</th>
                                
                            </tr>
                        </thead>
                        <tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['product_name']}</td>
                            <td>{$row['description']}</td>
                            <td>{$row['price']}</td>
                            
                        </tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "No products found.";
            }

            $conn->close();
            ?>
        </section>
    </div>

    <!-- Include Footer -->
    <?php include 'footer.html'; ?>

</body>

</html>