<?php
$servername = "localhost"; // Change this if your server is different
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "gymspy"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM project WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo 'success';
    } else {
        echo 'error';
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
