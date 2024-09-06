<?php
// Start the session
session_start();

// Include database connection
include 'db_connect.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if a user was found
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password, $role);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Store user information in session
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            // Redirect based on user role
            if ($role == 'admin') {
                header("Location:/project/adminpannel/dist/pages/index3.html"); // Admin-specific page
            } else if ($role == 'customer') {
                header("Location:/project/customer-profile/index.html"); // Customer-specific page
            } else {
                // header("Location:/project/Home.html"); // Default page or redirection
            }
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with this email!";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}

// If the user is already logged in, display content based on role
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        echo "<h1>Admin Dashboard</h1>";
        // Additional admin content
    } else if ($_SESSION['role'] == 'customer') {
        echo "<h1>Customer Homepage</h1>";
        // Additional customer content
    } else {
        echo "<h1>Welcome to our site</h1>";
        // Default content
    }
} else {
    header("Location:/project/login/login.html"); 
}
?>
