<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/Exception.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'fastnfresh23@gmail.com';
    $mail->Password = 'FASTNFRESH@2023';
    $mail->SMTPSecure = 'tls';

    $mail->setFrom($email, $name);
    $mail->addAddress('fastnfresh23@gmail.com');
    $mail->Subject = 'New Contact Message';
    $mail->Body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    if ($mail->send()) {
        $successMessage = "We genuinely appreciate your query! Our team will revert to you shortly.";
    } else {
        $errorMessage = "Our apologies, an error occurred while dispatching your message. Please attempt once more. Technical Details: " . $mail->ErrorInfo;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Fast N Fresh</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #E8F8F5;
            font-family: Arial, sans-serif;
        }
        h1, h3, label {
            color: #2E8B57;
        }
        .contact-info p {
            color: #4D4D4D;
        }
        .contact-form {
            background-color: #FEFEFE;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.1);
        }
        button {
            background-color: #138D75;
            border: none;
        }
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-5 text-center">Reach Out to Us</h1>
        <div class="row">
            <div class="col-md-6 mb-4 contact-info">
                <h3>Find Us Here</h3>
                <iframe src="https://maps.google.com/maps?q=15%20University%20Ave%2C%20Wolfville%20Nova%20Scotia&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0; width: 100%; height: 250px;" allowfullscreen=""></iframe>
                <h3 class="mt-4">Stay Connected</h3>
                <p><strong>Email:</strong> info@fastnfresh.com</p>
                <p><strong>Phone:</strong> +1 (555) 123-4567</p>
            </div>
            <div class="col-md-6">
                <div class="contact-form">
                    <?php if (isset($successMessage)): ?>
                        <div class="alert alert-success" role="alert">
                            <?= $successMessage ?>
                        </div>
                    <?php elseif (isset($errorMessage)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $errorMessage ?>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="contact.php">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
