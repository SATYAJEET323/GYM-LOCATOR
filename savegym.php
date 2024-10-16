<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start(); // Start session management

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Server-side validation
    $errors = array();

    // Validate and sanitize user input
    $name = isset($_POST['gymName']) ? htmlspecialchars(trim($_POST['gymName'])) : '';
    $location = isset($_POST['gymLocation']) ? htmlspecialchars(trim($_POST['gymLocation'])) : '';
    $info = isset($_POST['gymInfo']) ? htmlspecialchars(trim($_POST['gymInfo'])) : '';
    $address = isset($_POST['gymAddress']) ? htmlspecialchars(trim($_POST['gymAddress'])) : '';
    $price = isset($_POST['gymPrice']) ? htmlspecialchars(trim($_POST['gymPrice'])) : '';
    $contactNumber = isset($_POST['gymContactNumber']) ? htmlspecialchars(trim($_POST['gymContactNumber'])) : '';

    // Validate gym name
    if (empty($name)) {
        $errors['gymName'] = 'Please enter gym name.';
    } elseif (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
        $errors['gymName'] = 'Gym name should not contain any numbers.';
    }

    // Validate gym price
    if (empty($price)) {
        $errors['gymPrice'] = 'Please enter gym price.';
    } elseif (!preg_match("/^\d{1,5}$/", $price)) {
        $errors['gymPrice'] = 'Price should be maximum 5 digits.';
    }

    // Validate gym contact number
    if (empty($contactNumber)) {
        $errors['gymContactNumber'] = 'Please enter gym contact number.';
    } elseif (!preg_match("/^\d{10}$/", $contactNumber)) {
        $errors['gymContactNumber'] = 'Gym contact number should be 10 digits only.';
    }

    // Validate gym address
    if (strlen($address) > 300) {
        $errors['gymAddress'] = 'Address should not exceed 300 characters.';
    }

    // Validate gym info
    if (strlen($info) > 300) {
        $errors['gymInfo'] = 'Information should not exceed 300 characters.';
    }

    // If there are validation errors, return them as JSON response
    if (!empty($errors)) {
        echo json_encode(array("status" => 400, "errors" => $errors));
        exit();
    }
    
 
    // File upload handling
    $targetDirectory = "uploads/"; // Specify the directory where you want to store the uploaded images
    $targetFile = $targetDirectory . basename($_FILES["gymImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["gymImage"]["tmp_name"]);
    if ($check === false) {
        echo json_encode(array("status" => 400, "message" => "File is not an image."));
        exit();
    }

    // Check file size
    if ($_FILES["gymImage"]["size"] > 500000) {
        echo json_encode(array("status" => 400, "message" => "Sorry, your file is too large."));
        exit();
    }

    // Allow certain file formats
    if (!in_array($imageFileType, array("jpg", "png", "jpeg", "gif"))) {
        echo json_encode(array("status" => 400, "message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."));
        exit();
    }

    // Check if the file was successfully uploaded
    if (!move_uploaded_file($_FILES["gymImage"]["tmp_name"], $targetFile)) {
        echo json_encode(array("status" => 500, "message" => "Sorry, there was an error uploading your file."));
        exit();
    }

    try {
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "gymspy";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO gyms (name, location, info, address, price, contact_number, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("sssssss", $name, $location, $info, $address, $price, $contactNumber, $targetFile);

        if ($stmt->execute()) {
            // Store a success message in session
            $_SESSION['success_message'] = "Gym data saved successfully!";
            echo json_encode(array("status" => 200)); // Return success status as JSON
        } else {
            throw new Exception("Error saving gym data.");
        }

        // Close prepared statement
        $stmt->close();

        // Close database connection
        $conn->close();
    } catch (Exception $e) {
        echo json_encode(array("status" => 500, "message" => $e->getMessage())); // Return error status as JSON
    }
} else {
    // Handle other request methods (optional)
    echo json_encode(array("status" => 405, "message" => "Method Not Allowed")); // Return Method Not Allowed status as JSON
}
?>
