<?php
session_start();
require 'vendor/autoload.php';

// MongoDB Client Connection
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$db = $mongoClient->fastNfresh;

// Function to fetch random items from a collection with discounts applied
function getRandomDiscountedItems($db, $collectionName, $discountPercentage, $limit = 3) {
    $currentDate = date("Y-m-d");
    srand(hexdec(substr(md5($currentDate), 0, 8))); // Seed random number generator with current date

    $items = $db->$collectionName->find([]);
    $allItems = iterator_to_array($items);
    shuffle($allItems); // Shuffle items

    return array_slice($allItems, 0, $limit); // Return only a limited number of items
}

// Function to display items on the page
function displayDiscountedItems($items, $discountPercentage) {
    $itemsCount = 0;

    echo "<div class='row'>"; // Start a new row
    foreach ($items as $item) {
        // After every two items, end the current row and start a new one
        if ($itemsCount > 0 && $itemsCount % 2 == 0) {
            echo "</div><div class='row'>";
        }
        
        // Calculate the discounted price
        $discountedPrice = $item['current_price'] - ($item['current_price'] * ($discountPercentage / 100));
        
        // Item card with image, name, description, and prices
        echo "<div class='col-md-6 item-card' data-aos='fade-up'>";
        echo "<img src='" . htmlspecialchars($item['image_url']) . "' alt='" . htmlspecialchars($item['name']) . "' class='item-image'>";
        echo "<h3>" . htmlspecialchars($item['name']) . "</h3>";
        echo "<p class='description'>" . htmlspecialchars($item['description']) . "</p>";
        echo "<p class='price'>";
        echo "<span class='discounted-price'>$" . htmlspecialchars(number_format($discountedPrice, 2)) . "</span> ";
        echo "<span class='original-price'>$" . htmlspecialchars(number_format($item['current_price'], 2)) . "</span>";
        echo "</p>";
        
        // Form for adding item to cart
        echo "<form action='addToCart.php' method='post'>";
        echo "<input type='hidden' name='itemId' value='" . htmlspecialchars($item['_id']) . "' />";
        echo "<input type='hidden' name='itemName' value='" . htmlspecialchars($item['name']) . "' />";
        echo "<input type='hidden' name='itemPrice' value='" . htmlspecialchars(number_format($discountedPrice, 2)) . "' />";
        echo "<button type='submit' class='btn btn-discount'>Add to Cart</button>";
        echo "</form>";
        echo "</div>";

        $itemsCount++; // Increment item count
    }
    echo "</div>"; // End the last row
}

// Define discount percentage
$discountPercentage = 10;

// Fetching discounted items for each category
$discountedElectronics = getRandomDiscountedItems($db, 'electronics_items', $discountPercentage);
$discountedFashion = getRandomDiscountedItems($db, 'fashion_items', $discountPercentage);
$discountedCosmetics = getRandomDiscountedItems($db, 'cosmetics_items', $discountPercentage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Discounts - Fast N Fresh</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation Library -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }
        .discount-header {
            text-align: center;
            padding: 20px;
            background-color: #4caf50;
            color: white;
        }
        .discount-container {
            padding: 0 50px;
        }
        .item-card {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            background-color: white;
        }
        .item-card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 15px;
        }
        .item-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .btn-discount {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-discount:hover {
            background-color: #367c36;
        }
        .price {
            font-size: 1.2em;
            margin: 10px 0;
        }
        .discounted-price {
            color: #e53935; /* Attractive red for discounted price */
            font-weight: bold;
        }
        .original-price {
            text-decoration: line-through;
            color: #9e9e9e; /* Grey for original price */
            margin-left: 10px;
            font-size: 0.9em;
        }
        @media (min-width: 768px) {
            .col-md-6 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }
    </style>
</head>
<body>

<div class="discount-header">
    <h1>Today's Special Discounts</h1>
    <p>Don't miss out on our exclusive daily deals!</p>
</div>

<div class="container discount-container">
    <?php displayDiscountedItems($discountedElectronics, $discountPercentage); ?>
    <?php displayDiscountedItems($discountedFashion, $discountPercentage); ?>
    <?php displayDiscountedItems($discountedCosmetics, $discountPercentage); ?>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- AOS Animation Library -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1200,
        once: true,
    });
</script>

</body>
</html>
