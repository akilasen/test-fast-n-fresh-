<?php
require 'vendor/autoload.php';
session_start(); // Ensure session is started to access session variables

// Initialize the cart if it's not already set or not an array.
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$db = $mongoClient->fastNfresh;
$items = $db->groceries_items->find([]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast N Fresh - Groceries</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            margin: 20px 0;
        }
        .container {
            width: 100%;
            max-width: 100%;
            padding: 20px;
            margin: auto;
        }
        .item-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 0;
            margin: 0 auto;
        }
        .item-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
            background-color: #fafafa;
        }
        .item-image {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .btn-add-to-cart {
            color: #fff;
            background-color: #5cb85c;
            border-color: #4cae4c;
            text-decoration: none;
            padding: 10px 20px;
            display: inline-block;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-add-to-cart:hover {
            background-color: #449d44;
            border-color: #398439;
        }
        .btn-primary, .btn-secondary {
            margin: 10px;
            text-align: center;
        }
        .cart-icon {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Groceries</h1>
</div>

<!-- Cart Icon with Counter -->
<div class="cart-icon">
    <a href="cart.php" class="btn btn-info">
        View Cart (<span id="cart-count"><?= count($_SESSION['cart']) ?></span>)
    </a>
</div>

<div class="container">
    <div class="item-list">
        <?php foreach ($items as $item): ?>
            <div class="item-card">
                <img src="<?= htmlspecialchars($item['image_url']) ?>" class="item-image" alt="<?= htmlspecialchars($item['name']) ?>">
                <div class="item-info">
                    <h3><?= htmlspecialchars($item['name']) ?></h3>
                    <p>Price: <?= htmlspecialchars($item['current_price']) ?></p>
                    <p><?= htmlspecialchars($item['description']) ?></p>
                    <form action="addToCart.php" method="post">
                        <input type="hidden" name="itemId" value="<?= htmlspecialchars($item['_id']) ?>">
                        <input type="hidden" name="itemName" value="<?= htmlspecialchars($item['name']) ?>">
                        <input type="hidden" name="itemPrice" value="<?= htmlspecialchars($item['current_price']) ?>">
                        <button type="submit" class="btn-add-to-cart">Add to Cart</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <a href="home.php" class="btn btn-primary">Back to Home</a>
    <a href="products.php" class="btn btn-secondary">View All Categories</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
``
