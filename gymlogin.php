<?php
// Establish database connection
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "guum";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input
$email = $_POST['email'];
$password = $_POST['password'];

// Perform user authentication
$sql = "SELECT * FROM ulog WHERE email='$email' AND pass='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User exists, proceed with login
    header("Location: gyminfo.html"); // Redirect to logged-in page
} else {
    // User not registered, display alert message
    echo '<script>alert("You need to register first");</script>';
}

// Close database connection
$conn->close();
?>
