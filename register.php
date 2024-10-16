<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Replace with your MySQL username if different
$password = ""; // Replace with your MySQL password if different
$dbname = "gymspy"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize an array to store validation errors
$errors = array();

// Validate form data
if (empty($_POST['name'])) {
    $errors[] = "Username is required";
}
if (empty($_POST['email'])) {
    $errors[] = "Email is required";
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}
if (empty($_POST['password'])) {
    $errors[] = "Password is required";
} elseif ($_POST['password'] !== $_POST['cpass']) {
    $errors[] = "Passwords do not match";
}
if (empty($_POST['gender'])) {
    $errors[] = "Gender is required";
}

// Check if there are any validation errors
if (count($errors) > 0) {
    // Display errors
    foreach ($errors as $error) {
        echo "<p style='color: red;'>$error</p>";
    }
} else {
    // No validation errors, proceed with database insertion
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_BCRYPT);
    $gender = $conn->real_escape_string($_POST['gender']);

    // SQL to insert data into user table
    $sql = "INSERT INTO user (name, email, password, gender) VALUES ('$name', '$email', '$password', '$gender')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful
        echo "<script>alert('Registration successful!');</script>";
        echo "<script>window.location.href = 'gyminfo.html';</script>"; // Redirect to next page
    } else {
        // Error handling
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
