<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="view_cart.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section class="sec">
        <header>
            <a href="/project/Home.html"><img src="/project/icon/logob.png" class="logo"></a>
            <div>
                
                <ul>
                <li><a href="/project/Home.html" style="text-decoration: none;">Home</a></li>
                <li><a href="/project/adminpannel/Prod/admin/products.php" style="text-decoration: none;">Products</a></li>
                <li><a href="/project/WhatsNew/WhatsNew.html" style="text-decoration: none;">What's New</a></li>
                <li><a href="/project/Contact Us/Contact.html" style="text-decoration: none;">Contact</a></li>
            </ul>
            </div>
            <ul>
                <div class="search-container">
                    
                    <input type="text" placeholder="Search..." class="search-input">
                    <img src="/project/icon/searchb.png" alt="Search Icon" class="search-icon">
                </div>
                <li class="login"><a href="/project/login/login.html"><img src="/project/icon/userb.png" ></a></li>
                <li class="cart"><a href="/project/product1/ProdtoCart/view_cart.php"><img src="/project/icon/cartb.png" ></a></li>
                
            </ul>
        </header>
    
        <h1><center>Your Shoping Cart</center></h1>

    <section id="cart-items">
        <!-- Cart items will be dynamically added here -->
                <div class="cart-container">
                <?php
                    include 'db_connect.php';
                    session_start();

                    if (!isset($_SESSION['user_id'])) {
                        echo "<p class='message'>You need to log in to view your cart.</p>";
                        exit;
                    }

                    $user_id = $_SESSION['user_id'];

                    $sql = "SELECT cart_items.id, products.name, products.price, cart_items.quantity
                            FROM cart_items
                            JOIN products ON cart_items.product_id = products.id
                            WHERE cart_items.user_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $total = 0;
                        echo "<div class='cart-items'>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='cart-item'>";
                            echo "<h2>" . $row['name'] . "</h2>";
                            echo "<p class='price'>Price: Rs " . $row['price'] . "</p>";
                            echo "<p class='quantity'>Quantity: " . $row['quantity'] . "</p>";
                            echo "<p class='subtotal'>Subtotal: Rs " . ($row['price'] * $row['quantity']) . "</p>";
                            $total += $row['price'] * $row['quantity'];
                            echo "<a class='remove-btn' href='remove_from_cart.php?id=" . $row['id'] . "'>Remove</a>";
                            echo "</div>";
                        }
                        echo "</div>";
                        echo "<div class='cart-total'>";
                        echo "<h3>Total: Rs " . $total . "</h3>";
                        echo "<a class='checkout-btn' href='http://localhost/project/product1/ProdtoCart/payment.html'>Checkout</a>";
                        echo "</div>";
                    } else {
                        echo "<p class='message'>Your cart is empty.</p>";
                    }

                    $stmt->close();
                ?>
            </div>
    </section>

    <div id="cart-empty-message" class="hidden">
        <p>Your cart is empty.</p>
    </div>

    <!-- <button id="buy-now-button" class="hidden">Buy Now</button> -->
    <footer class="footer">

        <div class="row" style="margin-left: 60px; margin-right: 60px;">
            <div class="col">
                <div class="col1">
                    <img src="/project/icon/logo.png" alt="logo" class="logo">
                    <p>Blaze is not just an energy drink; it's a surge of vitality packed in a can.</p>
                </div>
            </div>
            <div class="col">
                <div class="col2">
                    <h5>Address <div class="underline"><span></span></div></h5>
                    <p>School Junction</p>
                    <p>Pitipana</p>
                    <p>Homagama</p>
                    <p>+94 123 45620</p>
                </div>
            </div>
            <div class="col">
                <div class="col3">
                    <h5>Links <div class="underline"><span></span></h5>
                    <ul>
                        <li><a href="/project/Home.html">Home</a></li>
                        <li><a href="/project/about us/about.html">About Us</a></li>                       
                        <li><a href="/project/Contact Us/Contact.html">Contact Us</a></li>
                    </ul>
                </div>    
            </div>
            <div class="col">
                <div class="col4">
                    <h5>Newsletter <div class="underline"><span></span></h5>
                    <form>
                        <input type="email" placeholder="Enter your email ID" required>
                        <button type="submit"><i class="fa-solid fa-arrow-right fa-2xl custom-icon"></i></button>
                    </form>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/share/RiesxHxFmt8yYZxu/?mibextid=qi2Omg" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.instagram.com/blaze_energy_official?utm_source=qr&igsh=MXRqMXIxMWE5aHhjdQ==" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://x.com/blaze_energy99" target="_blank"><i class="fa-brands fa-x"></i></a>
                        <a href="https://wa.me/0740560982" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <p class="copyright"><span>&#169;  </span> 2024 - BLAZE Energy . All Rights Reserved</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
