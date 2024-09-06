<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="productscss.css">
    <link rel="stylesheet" href="/project/ad/ads.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                <li class="login"><a href="/project/customer-profile/index.html"><img src="/project/icon/userb.png"></a></li>
                <li class="cart"><a href="/project/product1/ProdtoCart/view_cart.php"><img src="/project/icon/cartb.png"></a></li>
            </ul>
        </header>
    
        <h1><center>Our Products</center></h1>
        <p class="tagline"><center>Stay sharp. Stay strong.</center></p>
    </section>

    <main>
        <section id="products">
            <div class="product-row">
                <div class="product-container">
                    <?php
                    include 'db_connect.php';

                    $sql = "SELECT id, name, description, price, stock_quantity, image_url FROM products";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $productId = $row['id'];
                            $productName = strtolower(str_replace(' ', '', $row['name'])); // Convert product name to lowercase without spaces

                            echo "<div class='product-card'>";
                            echo "<img src='" . $row['image_url'] . "' alt='" . $row['name'] . "' class='product-image'>";
                            echo "<h2 class='product-name'>" . $row['name'] . "</h2>";
                            echo "<p class='product-description'>" . $row['description'] . "</p>";
                            echo "<p class='product-price'>Rs " . $row['price'] . "</p>";
                            echo "<p class='product-stock'>In Stock: " . $row['stock_quantity'] . "</p>";
                            echo "<a href='product$productId.html' class='buy-button'>See More</a>"; // Redirect to product specific page
                            echo "<a href='add_to_cart.php?id=" . $row['id'] . "' class='add-to-cart-btn'><i class='fas fa-shopping-cart'></i></a>";
                            echo "</div>";
                        }
                    } else {
                        echo "No products available.";
                    }

                    $conn->close();
                    ?>
                </div>
            </div>
        </section>
    </main>

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
                        <a href="https://wa.me/0715577940" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <p class="copyright"><span>&#169;  </span> 2024 - BLAZE Energy . All Rights Reserved</p>
    </footer> 
    <script src="search.js"></script>
</body>
</html>
