<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast N Fresh - Our Journey</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            line-height: 1.6;
            color: #555;
        }
        
        .banner {
            background-color: #16a085;
            color: #ffffff;
            padding: 80px 0;
            text-align: center;
            background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
        }

        .about-content {
            padding: 60px 0;
            background-color: #f9f9f9;
        }

        .mission-vision {
            padding: 40px 0;
            background-color: #ffffff;
            border-top: 1px solid #e7e7e7;
            border-bottom: 1px solid #e7e7e7;
        }

        .team-section {
            padding: 60px 0;
            background-color: #f9f9f9;
        }

        .team-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            border: none;
        }

        .team-card:hover {
            transform: translateY(-10px);
        }

    </style>
</head>
<body>

   
    <?php include('navbar.php'); ?>

    
    <section class="banner">
        <div class="container">
            <h1>Discover Fast N Fresh</h1>
            <p>An odyssey of passion, innovation, and dedication.</p>
        </div>
    </section>

   
    <section class="about-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>The Genesis of Our Endeavor</h2>
                    <p>At the heart of Fast N Fresh lies a tale of two visionary students, Thanuka Mabulage Don and Poorna Dadayakkara Dewege. As they embarked upon their academic pursuits at Acadia University in 2022, they grappled with the challenge of juggling their studies with the mundane task of grocery shopping. This very juxtaposition of academic rigor and daily chores birthed the idea of Fast N Fresh.</p>
                    <p>With a deep-rooted passion for technology and a profound desire to innovate, they envisioned a platform that marries convenience with quality. Their relentless pursuit of excellence led to the establishment of Fast N Fresh, dedicated to elevating the grocery shopping experience for all.</p>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <img src="logo.png" alt="Fast N Fresh Logo" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mission-vision">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Our Aspiration</h2>
                    <p>Fast N Fresh is not just a service; it’s a revolution. Our mission is to redefine grocery shopping by offering an unmatched blend of convenience, quality, and innovation. Our aim is to champion a sustainable shopping ecosystem that delights our patrons while having a minimal footprint on our planet.</p>
                </div>
                <div class="col-md-6">
                    <h2>Our Vision for Tomorrow</h2>
                    <p>We dream of a world where the grocery shopping narrative is reimagined. Where each transaction is a testament to our commitment to excellence and our patrons' trust. At Fast N Fresh, we continually seek ways to enhance the shopping experience, all while staying rooted in our values of sustainability and impeccable customer service.</p>
</div>
</div>
</div>
</section>
              
<section class="team-section">
    <div class="container">
        <h2 class="text-center">Meet The Pioneers</h2>
        <p class="text-center">The brilliant minds behind Fast N Fresh</p>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card team-card">
                    <img src="https://media.licdn.com/dms/image/C5603AQGg4WnZdVjbpA/profile-displayphoto-shrink_400_400/0/1631674935144?e=1703116800&v=beta&t=7Di1tzOtqAEj6TdXAA2HNHiWJdWCw_V3WoZ7oWeWH70" alt="Thanuka Mabulage Don" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Thanuka Mabulage Don</h5>
                        <p class="card-text">Co-founder & Chief Technical Officer</p>
                        <p>An ardent technology enthusiast with a knack for innovation. Thanuka believes in crafting tech solutions that touch lives.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card team-card">
                    <img src="https://media.licdn.com/dms/image/D4E03AQHDkhSAgnkkaQ/profile-displayphoto-shrink_400_400/0/1672115915203?e=1703116800&v=beta&t=loV1lH6eHcda7qnIGM1abJOkIFwjFQJWENcs3fFtnw0" alt="Poorna Dadayakkara Dewege" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Poorna Dadayakkara Dewege</h5>
                        <p class="card-text">Co-founder & Chief Operational Officer</p>
                        <p>Poorna is the driving force behind the operational excellence at Fast N Fresh. His vision is to make grocery shopping a delightful experience.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include('footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

