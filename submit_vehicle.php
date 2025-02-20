<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $fuel = $_POST['fuel'];
    $price = $_POST['price'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'car_rental');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO vehicles (make, model, year, fuel, price) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisi", $make, $model, $year, $fuel, $price);

    if ($stmt->execute()) {
        echo "Vehicle listed successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
