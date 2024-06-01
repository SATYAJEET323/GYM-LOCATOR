// Function to close the popup
function closeSlide() {
    document.getElementById("popup").style.display = "none";
}

// Function to validate the form before submission
function validateForm() {
    var username = document.forms["FormFill"]["un"].value;
    var email = document.forms["FormFill"]["email"].value;
    var password = document.forms["FormFill"]["pass"].value;
    var confirmPassword = document.forms["FormFill"]["cpass"].value;

    // Basic validation
    if (username == "" || email == "" || password == "" || confirmPassword == "") {
        alert("All fields must be filled out");
        return false;
    }
    if (password != confirmPassword) {
        alert("Passwords do not match");
        return false;
    }

    return true;
}
