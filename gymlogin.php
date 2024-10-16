<?php
// Establish database connection
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "gymspy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input and escape special characters
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    
    // Perform user authentication using prepared statements
    $stmt = $conn->prepare("SELECT * FROM project WHERE email = ? AND pass = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User exists, proceed with login
        header("Location: gyminfo.html"); // Redirect to logged-in page
        exit(); // Always use exit after header redirection
    } else {
        // User not registered, display alert message
        echo '<script>alert("You need to register first");</script>';
    }

    // Close the statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>
