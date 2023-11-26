<?php
require 'vendor/autoload.php';

$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$db = $mongoClient->fastNfresh;

$category = $_GET['category'] ?? 'groceries'; // Default to groceries if no category is set
$collection = $db->{$category . '_items'};
$items = $collection->find([]);

displayItemsChart($items, ucfirst($category));

function displayItemsChart($items, $categoryName) {
    echo "<h1>" . $categoryName . " Items</h1>";
    echo "<div class='item-chart'>";
    foreach ($items as $item) {
        echo "<div class='item-card'>";
        echo "<h2>" . $item['name'] . "</h2>";
        echo "<p>Price: " . $item['current_price'] . "</p>";
        echo "<p>Description: " . $item['description'] . "</p>";
        if (isset($item['image_url'])) {
            echo "<img src=\"" . $item['image_url'] . "\" alt=\"" . $item['name'] . "\" />";
        }
        echo "</div>";
    }
    echo "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... [head section with styles and scripts] ... -->
    <style>
        .item-chart {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .item-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            margin: 10px;
            width: 30%;
        }
        .item-card img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<!-- ... [body content with the PHP script output] ... -->

</body>
</html>
