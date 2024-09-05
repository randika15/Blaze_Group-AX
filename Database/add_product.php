<?php
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    $name = $_POST['product-name'];
    $description = $_POST['product-description'];
    $image_url = $_POST['product-image'];
    $price = $_POST['product-price'];
    $stock_quantity = $_POST['product-quantity'];

    // SQL query to insert product data into the products table
    $stmt = $conn->prepare("INSERT INTO products (name, description, image_url, price, stock_quantity) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssdi", $name, $description, $image_url, $price, $stock_quantity);

    if ($stmt->execute()) {
        echo "New product added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
?>