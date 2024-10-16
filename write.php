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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password']; // Ideally, hash this password before storing it
    $gender = $_POST['gender'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO project (name, email, phone, password, gender) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $password, $gender);

    // Execute the statement
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error: ' . $stmt->error; // Output error for debugging
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
