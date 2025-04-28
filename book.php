<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book a Flight</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- TailwindCSS -->
  <script src="https://unpkg.com/@tailwindcss/browser@latest"></script>
  <!-- AOS Animation CSS -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1549921296-3a73c58e82c3') no-repeat center center/cover;
      min-height: 100vh;
      color: white;
      padding-top: 100px;
    }
    .container {
      background: rgba(255, 255, 255, 0.1);
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.5);
      backdrop-filter: blur(10px);
    }
    .btn-custom {
      background: #4299e1;
      color: white;
      font-weight: 600;
      border-radius: 8px;
      transition: all 0.3s ease;
    }
    .btn-custom:hover {
      background: #3182ce;
      transform: scale(1.05);
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5" data-aos="fade-up">
  <h2 class="text-center mb-4" data-aos="fade-down">Book a Flight</h2>

  <form action="process_booking.php" method="POST">
    <div class="form-group" data-aos="fade-up">
      <label>Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group" data-aos="fade-up" data-aos-delay="100">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group" data-aos="fade-up" data-aos-delay="200">
      <label>Flight Number</label>
      <input type="text" name="flight_number" class="form-control" required>
    </div>
    <div class="form-group" data-aos="fade-up" data-aos-delay="300">
      <label>Travel Date</label>
      <input type="date" name="travel_date" class="form-control" required>
    </div>
    <div class="form-group" data-aos="fade-up" data-aos-delay="400">
      <label>Departure City</label>
      <select name="departure_city" id="departure_city" class="form-control" required>
    <option value="">Select Departure</option>
    <option value="Mumbai">Mumbai</option>
    <option value="Delhi">Delhi</option>
    <option value="Paris">Paris</option>
    <option value="New York">New York</option>
    <option value="Los Angeles">Los Angeles</option>
    <option value="Chicago">Chicago</option>
    <option value="London">London</option>
    <option value="San Francisco">San Francisco</option>
    <option value="Toronto">Toronto</option>
    <option value="Sydney">Sydney</option>
    <option value="Berlin">Berlin</option>
    <option value="Tokyo">Tokyo</option>
    <option value="Rio de Janeiro">Rio de Janeiro</option>
    <option value="Dubai">Dubai</option>
    <option value="Singapore">Singapore</option>
    <option value="Rome">Rome</option>
    <option value="Amsterdam">Amsterdam</option>
    <option value="Seoul">Seoul</option>
    <option value="Buenos Aires">Buenos Aires</option>
    <option value="Melbourne">Melbourne</option>
    <option value="Kolkata">Kolkata</option>
    <option value="Bangalore">Bangalore</option>
    <option value="Dallas">Dallas</option>
    <option value="San Diego">San Diego</option>
    <option value="Montreal">Montreal</option>
    <option value="Seattle">Seattle</option>
    <option value="Doha">Doha</option>
    <option value="Kuala Lumpur">Kuala Lumpur</option>
    <option value="Madrid">Madrid</option>
    <option value="Brussels">Brussels</option>
    <option value="Busan">Busan</option>
    <option value="Santiago">Santiago</option>
    <option value="Adelaide">Adelaide</option>
    <option value="Chennai">Chennai</option>
    <option value="Hyderabad">Hyderabad</option>
    <option value="Houston">Houston</option>
    <option value="Phoenix">Phoenix</option>
    <option value="Quebec City">Quebec City</option>
    <option value="Portland">Portland</option>
    <option value="Muscat">Muscat</option>
    <option value="Bangkok">Bangkok</option>
    <option value="Lisbon">Lisbon</option>
    <option value="Fukuoka">Fukuoka</option>
    <option value="Lima">Lima</option>
    <option value="Perth">Perth</option>
    <option value="Kochi">Kochi</option>
    <option value="Pune">Pune</option>
    <option value="Austin">Austin</option>
    <option value="Las Vegas">Las Vegas</option>
    <option value="Halifax">Halifax</option>
    <option value="Boise">Boise</option>
    <option value="Abu Dhabi">Abu Dhabi</option>
    <option value="Hanoi">Hanoi</option>
    <option value="Porto">Porto</option>
    <option value="Nagasaki">Nagasaki</option>
    <option value="Bogota">Bogota</option>
    <option value="Darwin">Darwin</option>
    <option value="Thiruvananthapuram">Thiruvananthapuram</option>
    <option value="Nagpur">Nagpur</option>
    <option value="San Antonio">San Antonio</option>
    <option value="Reno">Reno</option>
    <option value="St. John's">St. John's</option>
    <option value="Salt Lake City">Salt Lake City</option>
    <option value="Sharjah">Sharjah</option>
    <option value="Ho Chi Minh City">Ho Chi Minh City</option>
    <option value="Braga">Braga</option>
    <option value="Kagoshima">Kagoshima</option>
    <option value="Medellin">Medellin</option>
    <option value="Alice Springs">Alice Springs</option>
    <option value="Madurai">Madurai</option>
    <option value="Indore">Indore</option>
    <option value="El Paso">El Paso</option>
    <option value="Sacramento">Sacramento</option>
    <option value="Moncton">Moncton</option>
    <option value="Fredericton">Fredericton</option>
    <option value="Colorado Springs">Colorado Springs</option>
    <option value="Goa">Goa</option>
    <option value="Jaipur">Jaipur</option>
    <option value="Boston">Boston</option>
    <option value="Dublin">Dublin</option>
    <option value="Nice">Nice</option>
    <option value="Detroit">Detroit</option>
    <option value="San Jose">San Jose</option>
    <option value="Ottawa">Ottawa</option>
    <option value="Brisbane">Brisbane</option>
    <option value="Munich">Munich</option>
    <option value="Osaka">Osaka</option>
    <option value="Sao Paulo">Sao Paulo</option>
    <option value="Edinburgh">Edinburgh</option>
    <option value="Washington D.C.">Washington D.C.</option>
    <option value="Lyon">Lyon</option>
    <option value="Ahmedabad">Ahmedabad</option>
    <option value="Chandigarh">Chandigarh</option>
    <option value="Minneapolis">Minneapolis</option>
    <option value="Calgary">Calgary</option>
    <option value="Jakarta">Jakarta</option>
    <option value="Florence">Florence</option>
    <option value="Copenhagen">Copenhagen</option>
    <option value="Oakland">Oakland</option>
    <option value="Albuquerque">Albuquerque</option>
    <option value="Bhopal">Bhopal</option>
    <option value="Uluru">Uluru</option>
    <option value="Coimbatore">Coimbatore</option>
    <option value="Guimaraes">Guimaraes</option>
    <option value="Okinawa">Okinawa</option>
    <option value="Cali">Cali</option>
    <option value="St. John's">St. John's</option>
    <option value="Denver">Denver</option>
</select>
    </div>
    <div class="form-group" data-aos="fade-up" data-aos-delay="500">
      <label>Arrival City</label>
      <select name="arrival_city" id="arrival_city" class="form-control" required>
    <option value="">Select Arrival</option>
    <option value="New York">New York</option>
    <option value="London">London</option>
    <option value="Dubai">Dubai</option>
    <option value="Toronto">Toronto</option>
    <option value="Tokyo">Tokyo</option>
    <option value="Berlin">Berlin</option>
    <option value="Mumbai">Mumbai</option>
    <option value="Delhi">Delhi</option>
    <option value="Paris">Paris</option>
    <option value="Los Angeles">Los Angeles</option>
    <option value="Chicago">Chicago</option>
    <option value="Sydney">Sydney</option>
    <option value="Rio de Janeiro">Rio de Janeiro</option>
    <option value="San Francisco">San Francisco</option>
    <option value="Singapore">Singapore</option>
    <option value="Rome">Rome</option>
    <option value="Amsterdam">Amsterdam</option>
    <option value="Seoul">Seoul</option>
    <option value="Buenos Aires">Buenos Aires</soption>
    <option value="Melbourne">Melbourne</option>
    <option value="Kolkata">Kolkata</option>
    <option value="Bangalore">Bangalore</option>
    <option value="Dallas">Dallas</option>
    <option value="San Diego">San Diego</option>
    <option value="Montreal">Montreal</option>
    <option value="Seattle">Seattle</option>
    <option value="Doha">Doha</option>
    <option value="Kuala Lumpur">Kuala Lumpur</option>
    <option value="Madrid">Madrid</option>
    <option value="Brussels">Brussels</option>
    <option value="Busan">Busan</option>
    <option value="Santiago">Santiago</option>
    <option value="Adelaide">Adelaide</option>
    <option value="Chennai">Chennai</option>
    <option value="Hyderabad">Hyderabad</option>
    <option value="Houston">Houston</option>
    <option value="Phoenix">Phoenix</option>
    <option value="Quebec City">Quebec City</option>
    <option value="Portland">Portland</option>
    <option value="Muscat">Muscat</option>
    <option value="Bangkok">Bangkok</option>
    <option value="Lisbon">Lisbon</option>
    <option value="Fukuoka">Fukuoka</option>
    <option value="Lima">Lima</option>
    <option value="Perth">Perth</option>
    <option value="Kochi">Kochi</option>
    <option value="Pune">Pune</option>
    <option value="Austin">Austin</option>
    <option value="Las Vegas">Las Vegas</option>
    <option value="Halifax">Halifax</option>
    <option value="Boise">Boise</option>
    <option value="Abu Dhabi">Abu Dhabi</option>
    <option value="Hanoi">Hanoi</option>
    <option value="Porto">Porto</option>
    <option value="Nagasaki">Nagasaki</option>
    <option value="Bogota">Bogota</option>
    <option value="Darwin">Darwin</option>
    <option value="Thiruvananthapuram">Thiruvananthapuram</option>
    <option value="Nagpur">Nagpur</option>
    <option value="San Antonio">San Antonio</option>
    <option value="Reno">Reno</option>
    <option value="St. John's">St. John's</option>
    <option value="Salt Lake City">Salt Lake City</option>
    <option value="Sharjah">Sharjah</option>
    <option value="Ho Chi Minh City">Ho Chi Minh City</option>
    <option value="Braga">Braga</option>
    <option value="Kagoshima">Kagoshima</option>
    <option value="Medellin">Medellin</option>
    <option value="Alice Springs">Alice Springs</option>
    <option value="Madurai">Madurai</option>
    <option value="Indore">Indore</option>
    <option value="El Paso">El Paso</option>
    <option value="Sacramento">Sacramento</option>
    <option value="Moncton">Moncton</option>
    <option value="Fredericton">Fredericton</option>
    <option value="Colorado Springs">Colorado Springs</option>
    <option value="Goa">Goa</option>
    <option value="Jaipur">Jaipur</option>
    <option value="Boston">Boston</option>
    <option value="Dublin">Dublin</option>
    <option value="Nice">Nice</option>
    <option value="Detroit">Detroit</option>
    <option value="San Jose">San Jose</option>
    <option value="Ottawa">Ottawa</option>
    <option value="Brisbane">Brisbane</option>
    <option value="Munich">Munich</option>
    <option value="Osaka">Osaka</option>
    <option value="Sao Paulo">Sao Paulo</option>
    <option value="Edinburgh">Edinburgh</option>
    <option value="Washington D.C.">Washington D.C.</option>
    <option value="Lyon">Lyon</option>
    <option value="Ahmedabad">Ahmedabad</option>
    <option value="Chandigarh">Chandigarh</option>
    <option value="Minneapolis">Minneapolis</option>
    <option value="Calgary">Calgary</option>
    <option value="Jakarta">Jakarta</option>
    <option value="Florence">Florence</option>
    <option value="Copenhagen">Copenhagen</option>
    <option value="Oakland">Oakland</option>
    <option value="Albuquerque">Albuquerque</option>
    <option value="Bhopal">Bhopal</option>
    <option value="Uluru">Uluru</option>
    <option value="Coimbatore">Coimbatore</option>
    <option value="Guimaraes">Guimaraes</option>
    <option value="Okinawa">Okinawa</option>
    <option value="Cali">Cali</option>
    <option value="Adelaide">Adelaide</option>
    <option value="St. John's">St. John's</option>
    <option value="Denver">Denver</option>
</select>
    </div>
    <div class="form-group" data-aos="fade-up" data-aos-delay="600">
      <label>Flight Price</label>
      <input type="text" id="flightPrice" name="price" class="form-control" readonly>
      </div>
    <!-- ADD THIS inside your <form> just after the Flight Price input -->
    <div class="form-group" data-aos="fade-up" data-aos-delay="650">
      <label>Seat Preference</label>
      <select name="seat_preference" class="form-control" required>
        <option value="">Select Seat</option>
        <option value="Window Seat">Window Seat</option>
        <option value="Aisle Seat">Aisle Seat</option>
        <option value="Middle Seat">Middle Seat</option>
        <option value="Front Row Seat">Front Row Seat</option>
        <option value="Emergency Exit Row">Emergency Exit Row</option>
        <option value="Extra Legroom Seat">Extra Legroom Seat</option>
      </select>
</div>

    <div class="text-center" data-aos="zoom-in" data-aos-delay="700">
      <button type="submit" class="btn btn-custom">Book Flight</button>
    </div>
  </form>
</div>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1200,
  });

  $(document).ready(function() {
    $("#departure_city, #arrival_city").change(function() {
      var departure = $("#departure_city").val();
      var arrival = $("#arrival_city").val();

      if (departure && arrival) {
        $.ajax({
          url: "get_price.php",
          type: "POST",
          data: {departure: departure, arrival: arrival},
          success: function(data) {
            $("#flightPrice").val(data);
          }
        });
      }
    });
  });
</script>

</body>
</html>
