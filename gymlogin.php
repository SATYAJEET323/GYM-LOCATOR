<?php
// Start the session
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root"; // replace with your database username if different
$password = ""; // replace with your database password if any
$dbname = "gymspy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email and password from form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute SQL query to check user credentials
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        $_SESSION['email'] = $email;
        echo "<script>alert('Login successful!'); window.location.href = 'gyminfo.html';</script>";
    } else {
        // Invalid credentials
        echo "<script>alert('Invalid email or password. Please try again.'); window.location.href = 'gymlogin.html';</script>";
    }
}

// Close the database connection
$conn->close();
?>
