<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "root";
$database = "form";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $location = $_POST["location"];
    $guests = $_POST["guests"];
    $arrival = $_POST["arrival"];
    $leaving = $_POST["leaving"];

    // SQL query to insert data into the database
    $sql = "INSERT INTO booking_info (name, email, phone, address, location, guests, arrival, leaving)
            VALUES ('$name', '$email', '$phone', '$address', '$location', $guests, '$arrival', '$leaving')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
