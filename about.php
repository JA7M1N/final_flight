<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us - Flight Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .about-section {
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .contact-info {
            margin-top: 30px;
        }
        h2, h4 {
            color: #343a40;
        }
        p {
            color: #6c757d;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <div class="about-section">
        <h2 class="text-center mb-4">About Us</h2>
        <p>Welcome to FlightEase, your trusted partner in online flight bookings. 
           Our platform offers a simple, fast, and secure way to book your flights anytime, anywhere.</p>

        <h4 class="mt-4">Our Mission</h4>
        <p>To make travel accessible and hassle-free for everyone by providing reliable and affordable flight booking services.</p>

        <h4 class="mt-4">Our Vision</h4>
        <p>We aim to be the most customer-centric travel platform, connecting the world through easy and innovative solutions.</p>

        <div class="contact-info">
            <h4>Contact Us</h4>
            <p>Email: support@flightease.com</p>
            <p>Phone: +91 6356798331</p>
            <p>Address: 123 Skyview Towers, Travel City, India</p>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
