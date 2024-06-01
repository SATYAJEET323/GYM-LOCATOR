<?php
// Database connection details
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "guum"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize an array to store validation errors
$errors = array();

// Validate form data
if (empty($_POST['un'])) {
    $errors[] = "Username is required";
}
if (empty($_POST['email'])) {
    $errors[] = "Email is required";
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}
if (empty($_POST['pass'])) {
    $errors[] = "Password is required";
}

// Check if there are any validation errors
if (count($errors) > 0) {
    // Display errors
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
} else {
    // No validation errors, proceed with database insertion
    $username = $_POST['un'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // SQL to insert data into ureg table
    $sql = "INSERT INTO ulog (un, email, pass) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful
        echo "<script>alert('Registration successful!');</script>";
        echo "<script>window.location.href = 'gymlogin.html';</script>"; // Redirect to login page
    } else {
        // Error handling
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
