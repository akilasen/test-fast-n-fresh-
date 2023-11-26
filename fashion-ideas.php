<!DOCTYPE html>
<html>
<head>
    <title>Fashion Inspirations</title>
    <style>
        /* Global styles */
        body {
            background-color: #f0f0f8; /* Light purple background */
            color: #333;
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
        }

        /* Header styles */
        header {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,.2);
        }

        h1 {
            color: #6a329f; /* Deep purple for headlines */
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: pulse 2s infinite;
        }

        /* Fashion card styles */
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 20px auto;
            max-width: 1200px;
        }

        .fashion-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,.2);
            margin: 20px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 350px;
            cursor: pointer;
        }
        

        .fashion-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,.3);
        }

        .card-img-top {
            height: 300px;
            object-fit: cover;
            width: 100%;
            border-bottom: 5px solid #6a329f; /* Deep purple border for images */
            transition: border-bottom 0.3s ease;
        }
        .card-img-top:hover {
            border-bottom: 5px solid #9b59b6; /* Lighter purple on hover */
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            color: #6a329f;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1rem;
            margin-bottom: 15px;
        }
          /* Animation for header */
          @keyframes pulse {
            0% {transform: scale(1);}
            50% {transform: scale(1.05);}
            100% {transform: scale(1);}
        }

        /* Animation for images */
        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        .card-img-top {
            animation-name: fadeIn;
            animation-duration: 2s;
        }
    </style>
</head>
<body>
    <header>
        <h1>Explore the Latest Fashion Trends</h1>
    </header>

    <div class="container">
    <?php
        $fashionIdeas = [
            [
                "title" => "Summer Beachwear Essentials",
                "image" => "summer.jpg",
                "description" => "Discover the must-have beachwear trends this summer, from swimming shorts to airy kaftans and sun hats.",
                "youtube_link" => "https://www.amazon.ca/s?k=Summer+Beachwear+Essentials&crid=2X06PUOIN8GQH&sprefix=summer+beachwear+essentials%2Caps%2C216&ref=nb_sb_noss"
                
            ],
            [
                "title" => "Vintage Revival",
                "image" => "vintage.jpg",
                "description" => "Explore the classic charm of vintage fashion, featuring retro prints, polka dots, and timeless silhouettes.",
                "youtube_link" => "https://www.amazon.ca/s?k=Vintage+Revival&crid=3QTBKX852CHPQ&sprefix=vintage+revival%2Caps%2C299&ref=nb_sb_noss"
            ],
            [
                "title" => "Urban Street Style",
                "image" => "urban.jpg",
                "description" => "Get inspired by the bold and edgy looks of urban street style, blending comfort with a touch of rebellion.",
                "youtube_link" => "https://www.amazon.ca/s?k=Urban+Street+Style&crid=23AXYSSWVAU8R&sprefix=urban+street+style%2Caps%2C302&ref=nb_sb_noss"
            ],
         
            [
                "title" => "Eco-Friendly Fashion",
                "image" => "ecofriendly.jpg",
                "description" => "Embrace sustainable fashion choices with eco-friendly materials and ethical production practices.",
                "youtube_link" => "https://www.amazon.ca/s?k=Eco-Friendly+Fashion&crid=1I6Y7T2FJQ1P0&sprefix=eco-friendly+fashion%2Caps%2C217&ref=nb_sb_noss"
            ],
            [
                "title" => "Formal Elegance",
                "image" => "formal.jpg",
                "description" => "Discover the latest trends in formal wear, from sophisticated evening gowns to sleek tailored suits.",
                "youtube_link" => "https://www.amazon.ca/s?k=Formal+Elegance&crid=1Y5NUE1K0E39&sprefix=formal+elegance%2Caps%2C209&ref=nb_sb_noss"
            ],
            [
                "title" => "Sporty Chic",
                "image" => "sporty.jpg",
                "description" => "Blend comfort and style with sporty chic outfits, perfect for a casual day out or a light workout session.",
                "youtube_link" => "https://www.amazon.ca/s?k=Sporty+Chic&crid=2D4X130VVRR24&sprefix=sporty+chic%2Caps%2C260&ref=nb_sb_noss_1"
            ],
            [
                "title" => "Winter Warmers",
                "image" => "winter.jpg",
                "description" => "Stay cozy and stylish with winter essentials like oversized sweaters, scarves, and warm, plush coats.",
                "youtube_link" => "https://www.youtube.com/watch?v=link1"
            ],
            
        ];

        foreach ($fashionIdeas as $idea) {
            echo '<div class="fashion-card">';
            echo '<a href="' . $idea['youtube_link'] . '" target="_blank">'; // Link to YouTube video
            echo '<img class="card-img-top" src="' . $idea['image'] . '" alt="' . $idea['title'] . '">';
            echo '</a>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $idea['title'] . '</h5>';
            echo '<p class="card-text">' . $idea['description'] . '</p>';
            echo '</div>';
            echo '</div>';
        }
    ?>
</div>


    <?php include('footer.php'); ?>
</body>
</html>
