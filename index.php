<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EldoHub Car Rental</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>EldoHub Car Rental</h1>
        <nav>
            <a href="#listings">Vehicles</a>
            <a href="#owner-portal">Owner Portal</a>
            <a href="#contact">Contact Us</a>
        </nav>
    </header>
    <main>
        <section id="listings">
            <h2>Available Vehicles</h2>
            <div id="vehicle-container">
                <?php
                // Database connection
                $conn = new mysqli('localhost', 'root', '', 'car_rental');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query to get vehicles from the database
                $sql = "SELECT id, make, model, year, fuel, price, image FROM vehicles";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $make = htmlspecialchars($row['make']);
                        $model = htmlspecialchars($row['model']);
                        $year = htmlspecialchars($row['year']);
                        $fuel = htmlspecialchars($row['fuel']);
                        $price = htmlspecialchars($row['price']);
                        $imageData = base64_encode($row['image']); // Encode image data

                        // Render vehicle card
                        echo "
                        <div class='vehicle-card'>
                            <img src='data:image/jpeg;base64,$imageData' alt='$make $model' style='width: 100%; height: auto;'>
                            <h3>$make $model</h3>
                            <p>Year: $year</p>
                            <p>Fuel Type: $fuel</p>
                            <p>Price: KES $price/day</p>
                            <button class='book-now' data-vehicle='$make $model'>Book Now</button>
                        </div>";
                    }
                } else {
                    echo "<p>No vehicles available at the moment.</p>";
                }

                $conn->close();
                ?>
            </div>
        </section>
        <section id="owner-portal">
            <h2>Car Owner Portal</h2>
            <form id="owner-form" action="upload_vehicle.php" method="post" enctype="multipart/form-data">
                <label>Car Make: <input type="text" name="make" required></label>
                <label>Car Model: <input type="text" name="model" required></label>
                <label>Year: <input type="number" name="year" required></label>
                <label>Fuel Type: <input type="text" name="fuel" required></label>
                <label>Price Per Day: <input type="number" name="price" required></label>
                <label>Car Image: <input type="file" name="car_image" accept="image/*" required></label>
                <button type="submit">List Your Car</button>
            </form>
        </section>
        <section id="contact">
            <h2>Contact Us</h2>
            <p>Chat with us for assistance!</p>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Car Rental Service</p>
    </footer>

    <div id="booking-modal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Book a Vehicle</h2>
            <form id="booking-form" action="send_booking.php" method="post">
                <input type="hidden" name="vehicle" id="vehicle-name">
                <label>Name: <input type="text" name="name" required></label>
                <label>Email: <input type="email" name="email" required></label>
                <label>Phone: <input type="tel" name="phone" required></label>
                <label>Pick-Up Date: <input type="date" name="pickup_date" required></label>
                <label>Return Date: <input type="date" name="return_date" required></label>
                <button type="submit">Submit Booking</button>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
    
</body>
</html>
