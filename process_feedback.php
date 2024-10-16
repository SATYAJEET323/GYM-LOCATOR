<?php
$servername = "localhost";
$username = "root"; // Replace 'your_username' with your actual username
$password = ""; // Replace 'your_password' with your actual password
$dbname = "gymspy"; // Replace 'your_database' with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];

    // Prepare SQL statement
    $sql = "INSERT INTO feedback (rating, description) VALUES (?, ?)";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $rating, $feedback);

    // Execute the statement
    if ($stmt->execute()) {
        // Close statement
        $stmt->close();
        
        // Close connection
        $conn->close();
        
        // Redirect to the landing page
        header("Location: lastpg.html");
        exit; // Ensure that script execution stops after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
