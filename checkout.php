<?php
session_start();
// Redirect to cart if cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: cart.php');
    exit();
}

$drivers = ['Alex', 'Jamie', 'Sam', 'Taylor', 'Jordan'];
$driverName = $drivers[array_rand($drivers)];

// Placeholder for delivery time and distance
// In a real application, you would get the distance using Google Maps API
$customerAddress = "Customer Address"; // This would be retrieved from form submission
$storeAddress = "15 University Ave, Wolfville";
$deliveryTime = "Estimated time will be calculated upon entry of your address.";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Fast N Fresh</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f7f7;
        }
        .card-input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #ced4da;
        }
        .card-detail-input {
            position: relative;
        }
        .card-detail-input input {
            padding-right: 2.5rem;
        }
        .payment-methods img {
            height: 24px;
            margin-right: 10px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            animation: slideInFromTop 1s ease-out forwards;
        }
        .form-section {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #eceff1;
            border-radius: 8px;
            transform: translateY(20px);
            opacity: 0;
            animation: fadeInUp 0.5s ease-out forwards;
        }
        .form-section h3 {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .form-control {
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
            padding: 10px 30px;
            border-radius: 5px;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
        @keyframes fadeInUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        @keyframes slideInFromTop {
            0% {
                transform: translateY(-100%);
            }
            100% {
                transform: translateY(0);
            }
        }
        /* Delay animation of each form section */
        .form-section:nth-child(2) { animation-delay: 0.2s; }
        .form-section:nth-child(3) { animation-delay: 0.4s; }
        .form-section:nth-child(4) { animation-delay: 0.6s; }
    </style>
</head>
<body>
<div class="container">
    <!-- Other form sections for payment, customer details, etc. -->

    <div class="delivery-section">
        <h3>Delivery Details</h3>
        <p>Delivery Driver: <?= $driverName; ?></p>
        <p>Estimated Delivery Time: <?= $deliveryTime; ?></p>

        <!-- Display a static Google Map placeholder -->
        <!-- In a real application, use Google Maps API to generate this dynamically -->
        <div id="map-placeholder">
            <p>Map from <?= $storeAddress ?> to <?= $customerAddress ?>:</p>
            <!-- A real application would replace 'src' with a dynamic URL including coordinates -->
            <iframe
                width="600"
                height="450"
                style="border:0"
                loading="lazy"
                allowfullscreen
                src="https://www.google.com/maps/embed/v1/directions?key=YOUR_API_KEY&origin=<?= urlencode($storeAddress) ?>&destination=<?= urlencode($customerAddress) ?>">
            </iframe>
        </div>
    </div>



<div class="container">
    <div class="cart-header text-center">
        <h2>Checkout</h2>
    </div>

    <form action="processCheckout.php" method="post">
        <!-- Payment Details -->
        <div class="form-section">
            <h3>Payment Details</h3>
            <div class="payment-methods">
                <!-- Include images for payment methods -->
                <img src="path_to_visa_image.png" alt="Visa">
                <img src="path_to_mastercard_image.png" alt="MasterCard">
                <!-- Add other card logos as needed -->
            </div>
            <div class="card-detail-input mb-3">
                <input type="text" class="form-control" placeholder="Card number" aria-label="Card number">
                <i class="far fa-credit-card card-input-icon"></i>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" placeholder="Name on card" aria-label="Name on card">
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" placeholder="Expiry date" aria-label="Expiry date">
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" placeholder="Security code" aria-label="Security code">
                </div>
            </div>
        </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentMethod" id="inperson" value="inperson">
                <label class="form-check-label" for="inperson">
                    Pay in Person
                </label>
            </div>
        </div>

        <!-- Delivery Details -->
        <div class="form-section">
            <h3>Delivery Details</h3>
            <input type="text" name="deliveryTime" placeholder="Preferred Delivery Time" class="form-control">
            <input type="text" name="driverName" placeholder="Driver's Name (if known)" class="form-control">
        </div>

        <!-- Customer Details -->
        <div class="form-section">
            <h3>Customer Details</h3>
            <input type="text" name="customerName" placeholder="Your Full Name" class="form-control" required>
            <input type="text" name="customerAddress" placeholder="Delivery Address" class="form-control" required>
            <input type="email" name="customerEmail" placeholder="Email Address" class="form-control">
            <input type="tel" name="customerPhone" placeholder="Phone Number" class="form-control">
        </div>

        <button type="submit" class="btn btn-custom">Confirm and Pay</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
