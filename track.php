<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Track Flight</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Leaflet CSS for map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <style>
        #map { height: 500px; margin-top: 30px; }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Track Your Flight</h2>

    <form method="post" class="mb-5">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Flight ID:</label>
            <input type="text" name="flight_number" class="form-control" required />
        </div>
        <div class="text-center">
            <button type="submit" name="track" class="btn btn-primary">Track Flight</button>
        </div>
    </form>

<?php
$showMap = false; // control map
if (isset($_POST['track'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $flight_number = $_POST['flight_number'];

    $stmt = $conn->prepare("SELECT departure_city, arrival_city FROM bookings WHERE name=? AND email=? AND flight_number=? LIMIT 1");
    $stmt->bind_param("sss", $name, $email, $flight_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        if ($row = $result->fetch_assoc()) {
            $departure_city = $row['departure_city'];
            $arrival_city = $row['arrival_city'];
            $showMap = true;

            echo "<div class='alert alert-success text-center'>
                    <strong>Departure City:</strong> $departure_city<br>
                    <strong>Arrival City:</strong> $arrival_city
                  </div>";
        } else {
            echo "<div class='alert alert-danger text-center'>Flight details not found!</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Query failed: " . htmlspecialchars($conn->error) . "</div>";
    }
}
?>

<?php if ($showMap): ?>
<!-- Loading Spinner -->
<div id="loading" class="text-center mt-5">
    <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<!-- Flight info -->
<div id="flight-info"></div>

<!-- Map -->
<div id="map"></div>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

<script>
    var map = L.map('map').setView([20, 0], 2); // Centered globally
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data © OpenStreetMap contributors'
    }).addTo(map);

    async function plotRoute(departureCity, arrivalCity) {
        const getCoords = async (city) => {
            const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${city}`);
            const data = await response.json();
            if (data.length == 0) {
                alert('Could not find location: ' + city);
                throw new Error('Location not found: ' + city);
            }
            return [parseFloat(data[0].lat), parseFloat(data[0].lon)];
        }

        const depCoords = await getCoords(departureCity);
        const arrCoords = await getCoords(arrivalCity);

        // Markers
        L.marker(depCoords).addTo(map).bindPopup('Departure: ' + departureCity).openPopup();
        L.marker(arrCoords).addTo(map).bindPopup('Arrival: ' + arrivalCity);

        // Polyline
        var routeLine = L.polyline([depCoords, arrCoords], {color: 'blue'}).addTo(map);
        map.fitBounds([depCoords, arrCoords], {padding: [50, 50]});

        // Airplane icon
        var planeIcon = L.icon({
            iconUrl: 'https://cdn-icons-png.flaticon.com/512/44/44970.png',
            iconSize: [40, 40],
            iconAnchor: [20, 20]
        });

        var plane = L.marker(depCoords, {icon: planeIcon}).addTo(map);

        // Animate plane
        let steps = 1000;
        let i = 0;
        let latStep = (arrCoords[0] - depCoords[0]) / steps;
        let lonStep = (arrCoords[1] - depCoords[1]) / steps;

        function movePlane() {
            if (i <= steps) {
                let newLat = depCoords[0] + latStep * i;
                let newLon = depCoords[1] + lonStep * i;
                plane.setLatLng([newLat, newLon]);
                i++;
                requestAnimationFrame(movePlane);
            }
        }
        movePlane();

        // Calculate Distance
        function calculateDistance(lat1, lon1, lat2, lon2) {
            function toRad(x) {
                return x * Math.PI / 180;
            }
            var R = 6371;
            var dLat = toRad(lat2 - lat1);
            var dLon = toRad(lon2 - lon1);
            var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                    Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
                    Math.sin(dLon/2) * Math.sin(dLon/2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
            return R * c;
        }

        const distance = calculateDistance(depCoords[0], depCoords[1], arrCoords[0], arrCoords[1]);
        document.getElementById('flight-info').innerHTML = `
            <div class="alert alert-info text-center">
                Distance: ${distance.toFixed(2)} km<br>
                Estimated Flight Time: ${(distance / 800).toFixed(2)} hours
            </div>
        `;
    }

    // Show loading spinner
    document.getElementById('loading').style.display = 'block';

    plotRoute('<?php echo $departure_city; ?>', '<?php echo $arrival_city; ?>')
        .then(() => {
            document.getElementById('loading').style.display = 'none';
        })
        .catch(err => {
            document.getElementById('loading').style.display = 'none';
            alert('Error plotting route: ' + err.message);
        });

</script>
<?php endif; ?>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
