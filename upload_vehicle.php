<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $fuel = $_POST['fuel'];
    $price = $_POST['price'];
    $image = file_get_contents($_FILES['car_image']['tmp_name']); // Read the uploaded image file

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'car_rental');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert vehicle details into the database
    $stmt = $conn->prepare("INSERT INTO vehicles (make, model, year, fuel, price, image) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssidis", $make, $model, $year, $fuel, $price, $image);

    if ($stmt->execute()) {
        echo "Vehicle listed successfully!";
        echo "<br><a href='index.php'>Go back to home</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
