<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
        font-family: 'Open Sans', sans-serif;
    }

    footer {
        color: #e4e4e4;
        padding: 20px 0;
        margin-top: auto;
        animation: color-shift 10s ease infinite;
        border-top: 5px solid #fff; /* Adding a top border */
    }

    footer a {
        color: #e4e4e4;
        text-decoration: none;
        padding: 0 10px;
        transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    footer a:hover {
        color: #ffcc29; /* Bright color on hover */
        text-shadow: 0 0 10px #ffcc29; /* Glow effect on hover */
    }

    .footer-links {
        margin-top: 10px;
    }

    .social-media-icons a {
        font-size: 20px;
        margin: 0 8px;
        transition: transform 0.3s ease, color 0.3s ease;
    }

    .social-media-icons a:hover {
        transform: scale(1.2);
        color: #ffcc29; /* Bright color on hover */
    }

    @keyframes color-shift {
        0%, 100% { background: linear-gradient(45deg, #4b6cb7, #182848); }
        25% { background: linear-gradient(45deg, #9b59b6, #3498db); }
        50% { background: linear-gradient(45deg, #e74c3c, #f39c12); }
        75% { background: linear-gradient(45deg, #2ecc71, #1abc9c); }
    }
</style>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p>&copy; Fast N Fresh - All rights reserved</p>
            </div>
            <div class="col-md-4">
                <div class="footer-links text-md-center">
                    <a href="home.php">Home</a> |
                    <a href="about.php">About Us</a> |
                    <a href="groceryapp.php">Products</a> |
                    <a href="suppliers.php">Suppliers</a> |
                    <a href="contact.php">Help</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="social-media-icons text-md-right">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
