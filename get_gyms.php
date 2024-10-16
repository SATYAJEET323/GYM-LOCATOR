<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Establish a database connection (replace with your credentials)
$mysqli = new mysqli("localhost", "root", "", "gymspy");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$mysqli->set_charset("utf8");

// Get and validate the location from the query parameter
$location = isset($_GET['location']) ? $_GET['location'] : '';
$location = trim($location); // Trim leading and trailing spaces

// Validate or sanitize $location as needed

// Fetch gyms from the database based on location
$query = "SELECT id, name, location, address, price, contact_number, info, image FROM gyms WHERE location = ?";
$stmt = $mysqli->prepare($query);

// Check if the prepare statement was successful
if ($stmt) {
    $stmt->bind_param("s", $location);
    $stmt->execute();

    // Get result set
    $result = $stmt->get_result();

    // Fetch gyms as an associative array
    $gyms = [];
    while ($row = $result->fetch_assoc()) {
        $gyms[] = $row;
    }

    // Close the statement
    $stmt->close();
} else {
    // Handle failed prepare statement
    $gyms = [];
}

// Close the database connection
$mysqli->close();

// Output JSON-encoded gym data
header('Content-Type: application/json');
echo json_encode($gyms);
?>
