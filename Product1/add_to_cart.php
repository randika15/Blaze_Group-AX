<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "You need to log in to add items to the cart.";
    exit;
}

$user_id = $_SESSION['user_id'];
$product_id = $_GET['id'];
$quantity = 1; // Default quantity to add

$sql = "INSERT INTO cart_items (user_id, product_id, quantity) VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE quantity = quantity + ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiii", $user_id, $product_id, $quantity, $quantity);

if ($stmt->execute()) {
    echo "Product added to cart.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
?>
<a href="products.php">Continue Shopping</a>
<a href="view_cart.php">View Cart</a>
