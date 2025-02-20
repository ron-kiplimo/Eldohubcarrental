<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicle = htmlspecialchars($_POST['vehicle']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $pickup_date = htmlspecialchars($_POST['pickup_date']);
    $return_date = htmlspecialchars($_POST['return_date']);

    // Email details
    $to = "markkipkorir8@gmail.com";
    $subject = "New Booking Request for $vehicle";
    $message = "Booking Details:\n\n"
        . "Name: $name\n"
        . "Email: $email\n"
        . "Phone: $phone\n"
        . "Vehicle: $vehicle\n"
        . "Pick-Up Date: $pickup_date\n"
        . "Return Date: $return_date\n";
    $headers = "From: noreply@yourwebsite.com";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Booking request sent successfully!";
    } else {
        echo "Failed to send booking request. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
