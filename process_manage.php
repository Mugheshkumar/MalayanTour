<!-- process_manage.php -->

<?php
include 'config.php';
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['product_name'];
    // Other product details...

    // Insert the product data into the database
    $data = [
        'product_name' => $productName,
        // Add other fields as needed
    ];

    if (insertRecord('products', $data)) {
        echo "Product saved successfully.";
    } else {
        echo "Failed to save product. Please try again.";
    }
} else {
    echo "Invalid request method.";
}
?>