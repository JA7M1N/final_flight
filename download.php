<?php
include 'db.php';

if (isset($_POST['download'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $flight_number = mysqli_real_escape_string($conn, $_POST['flight_number']);

    $query = "SELECT name, email, departure_city, arrival_city, travel_date, price 
              FROM bookings 
              WHERE name='$name' AND email='$email' AND flight_number='$flight_number' 
              LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $content = "Flight Booking Details\n";
        $content .= "---------------------------\n";
        $content .= "Name: " . $row['name'] . "\n";
        $content .= "Email: " . $row['email'] . "\n";
        $content .= "Departure City: " . $row['departure_city'] . "\n";
        $content .= "Arrival City: " . $row['arrival_city'] . "\n";
        $content .= "Date: " . $row['travel_date'] . "\n";
        $content .= "Price: $" . number_format($row['price'], 2) . "\n";
        $content .= "---------------------------\n";

        // Send file headers
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="flight_details.txt"');
        header('Content-Length: ' . strlen($content));

        // Output the file content
        echo $content;
        exit;
    } else {
        echo "<script>alert('Flight details not found!'); window.history.back();</script>";
        exit;
    }
}
?>

<!-- HTML Part (Only form visible if no post yet) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Download Flight Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Download Your Flight Details</h2>

    <form method="post" class="mb-4">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Flight Number:</label>
            <input type="text" name="flight_number" class="form-control" required />
        </div>
        <div class="text-center">
            <button type="submit" name="download" class="btn btn-primary">Download Details</button>
        </div>
    </form>

    <div class="text-center">
        <a href="index.php" class="btn btn-secondary">Return to Home</a>
    </div>
</div>

</body>
</html>
