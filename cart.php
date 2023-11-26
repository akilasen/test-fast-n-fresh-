<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Fast N Fresh</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f6f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 30px auto;
            transform: scale(1);
            transition: transform 0.5s ease-in-out;
        }
        .container:hover {
            transform: scale(1.02);
        }
        .cart-header h2 {
            color: #ff7851;
            font-weight: 600;
            text-align: center;
            padding: 0.5rem;
            background-color: #ffe5d9;
            margin-bottom: 1rem;
            transition: all 0.3s ease-in-out;
        }
        .cart-header h2:hover {
            background-color: #ff7851;
            color: white;
        }
        .cart-item {
            border-bottom: 2px dashed #ff7851;
            padding-bottom: 10px;
            margin-bottom: 10px;
            animation: fadeIn 0.3s ease-out forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .cart-item:last-child {
            border-bottom: none;
        }
        .price-per-unit, .item-total-price {
            color: #28a745;
        }
        .total-price {
            font-size: 1.5rem;
            color: #007bff;
            font-weight: bold;
            text-align: right;
        }
        .btn-custom {
            padding: 10px 30px;
            border-radius: 5px;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.2s ease-in-out;
        }
        .btn-custom:hover {
            opacity: 0.8;
        }
        .checkout-btn {
            background-color: #28a745;
            color: white;
        }
        .update-btn {
            background-color: #f0ad4e;
            color: black;
        }
        .remove-btn {
            background-color: #d9534f;
            color: white;
        }
        .remove-btn:hover {
            background-color: #c9302c;
        }
        .item-quantity {
            width: 60px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="cart-header">
        <h2>Your Shopping Cart</h2>
    </div>

    <?php if (empty($_SESSION['cart'])): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <div class="cart-items">
            <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                <div class="cart-item">
                    <h4><?= htmlspecialchars($item['name']); ?></h4>
                    <p>Unit Price: $<span class="price-per-unit"><?= number_format($item['price'], 2); ?></span></p>
                    <p>Quantity: <input type="number" class="item-quantity" value="<?= $item['quantity']; ?>" min="1"></p>
                    <p>Total: $<span class="item-total-price"><?= number_format($item['quantity'] * $item['price'], 2); ?></span></p>
                    <button class="btn btn-custom remove-btn" data-index="<?= $index; ?>">Remove</button>
                </div>
                <?php $totalPrice += ($item['price'] * $item['quantity']); ?>
            <?php endforeach; ?>
        </div>

        <div class="total-price" id="subtotal">
            Subtotal: $<?= number_format($totalPrice, 2); ?>
        </div>

        <div class="checkout">
            <button class="btn btn-custom checkout-btn">Proceed to Checkout</button>
        </div>
    <?php endif; ?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    // Handle the removal of items from the cart
    $(document).on('click', '.remove-btn', function() {
        var index = $(this).data('index'); // Get the index of the item
        $.ajax({
            url: 'remove_item.php', // The file to call
            type: 'POST',
            dataType: 'json',
            data: {index: index},
            success: function(response) {
                if(response.success) {
                    // If the item is successfully removed, remove the item from the DOM
                    $(`div[data-index='${index}']`).remove();
                    updateSubtotal(); // Update the subtotal after removal
                } else {
                    alert('Item could not be removed. ' + response.error);
                }
            },
            error: function() {
                alert('There was an error removing the item.');
            }
        });
    });

    // Update the subtotal when items are removed
    function updateSubtotal() {
        var subtotal = 0;
        $('.item-total-price').each(function() {
            subtotal += parseFloat($(this).text());
        });
        $('#subtotal').text(`Subtotal: $${subtotal.toFixed(2)}`);
    }
</script>
</body>
</html>
