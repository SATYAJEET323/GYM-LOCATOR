function saveGym() {
    // Retrieve form inputs
    const gymName = document.getElementById('gymName').value.trim();
    const gymLocation = document.getElementById('gymLocation').value.trim();
    const gymAddress = document.getElementById('gymAddress').value.trim();
    const gymPrice = document.getElementById('gymPrice').value.trim();
    const gymContactNumber = document.getElementById('gymContactNumber').value.trim();
    const gymInfo = document.getElementById('gymInfo').value.trim();
    const gymImage = document.getElementById('gymImage').files[0]; // Retrieve the uploaded image file

    // Reset error messages
    document.querySelectorAll('.error-message').forEach(element => {
        element.textContent = '';
    });

    // Client-side validation
    let isValid = true;  

//     // // Validation for gym name
//     const gymNameError = document.getElementById('gymNameError');
//  array.forEach(element => {
//        if (gymName === '') {
//            gymNameError.textContent = 'Please enter gym name.';
//            isValid = false;
//        } else if (!/^[a-zA-Z\s]*$/.test(gymName)) {
//            gymNameError.textContent = 'Gym name should not contain any numbers.';
//            isValid = false;
//        }
   
//        // // Validation for gym price
//        const gymPriceError = document.getElementById('gymPriceError');
//        if (gymPrice === '') {
//            gymPriceError.textContent = 'Please enter gym price.';
//            isValid = false;
//        } else if (!/^\d{1,5}$/.test(gymPrice)) {
//            gymPriceError.textContent = 'Price should be maximum 5 digits.';
//            isValid = false;
//        }
   
//        // // Validation for gym contact number
//        const gymContactNumberError = document.getElementById('gymContactNumberError');
//        if (gymContactNumber === '') {
//            gymContactNumberError.textContent = 'Please enter gym contact number.';
//            isValid = false;
//        } else if (!/^\d{10}$/.test(gymContactNumber)) {
//            gymContactNumberError.textContent = 'Gym contact number should be 10 digits only.';
//            isValid = false;
//        }
   
//        // // Validation for gym address
//        const gymAddressError = document.getElementById('gymAddressError');
//        if (gymAddress.length > 300) {
//            gymAddressError.textContent = 'Address should not exceed 300 characters.';
//            isValid = false;
//        }
   
//        // // Validation for gym info
//        const gymInfoError = document.getElementById('gymInfoError');
//        if (gymInfo.length > 300) {
//            gymInfoError.textContent = 'Information should not exceed 300 characters.';
//            isValid = false;
//        }
   
//        // If all client-side validations pass, proceed with form submission
//  });
      if (isValid) {
        // Prepare form data
        const formData = new FormData();
        formData.append('gymName', gymName);
        formData.append('gymLocation', gymLocation);
        formData.append('gymAddress', gymAddress);
        formData.append('gymPrice', gymPrice);
        formData.append('gymContactNumber', gymContactNumber);
        formData.append('gymInfo', gymInfo);
        formData.append('gymImage', gymImage);

        // Make a simple AJAX request to save gym data
        fetch('savegym.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => {
            console.log('Response Status:', response.status);
            return response.json(); // Parse response as JSON
        })
        .then(data => {
            console.log('Raw Response:', data);

            // Display server-side validation errors if present
            if (data.errors) {
                console.error('Server-side validation errors:');
                for (const key in data.errors) {
                    if (data.errors.hasOwnProperty(key)) {
                        console.error(`${key}: ${data.errors[key]}`);
                        // Display error messages in the respective error message elements on the page
                        const errorMessageElement = document.getElementById(`${key}Error`);
                        if (errorMessageElement) {
                            errorMessageElement.textContent = data.errors[key];
                        }
                    }
                }
            } else if (data.status === 200) {
                alert('Gym data saved successfully!');
            } else {
                alert('Error saving gym data. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error making the network request:', error);
            alert('An unexpected error occurred. Please try again later.');
        });
    }
    }



    
function searchGyms() {
    const location = document.getElementById('selectedLocation').value;

    fetch(`get_gyms.php?location=${location}`)
        .then(response => response.json())
        .then(gyms => {
            const gymsContainer = document.querySelector('.content');
            gymsContainer.innerHTML = ''; // Clear previous results

            gyms.forEach(gym => {
                const gymCard = document.createElement('div');
                gymCard.className = 'card'; // Assign class for styling
                gymCard.innerHTML = `
                    <h3 class="gym-name">${gym.name}</h3>
                    <div class="image">
                        <img src="${gym.image}" alt="${gym.name} Image">
                    </div>
                    <p><strong>Location:</strong> ${gym.location}</p>
                    <p><strong>Address:</strong> ${gym.address}</p>
                    <p><strong>Price:</strong> ${gym.price}</p>
                    <p><strong>Contact Number:</strong> ${gym.contact_number}</p>
                    <p>${gym.info}</p>
                `;
                gymsContainer.appendChild(gymCard);
            });
        })
        .catch(error => {
            console.error('Error fetching gyms:', error);
            alert('Error fetching gyms. Please try again.');
        });
}




    
function searchGyms() {
    const location = document.getElementById('selectedLocation').value;

    fetch(`get_gyms.php?location=${location}`)
        .then(response => response.json())
        .then(gyms => {
            const gymsContainer = document.querySelector('.content');
            gymsContainer.innerHTML = ''; // Clear previous results

            gyms.forEach(gym => {
                const gymCard = document.createElement('div');
                gymCard.className = 'card'; // Assign class for styling
                gymCard.innerHTML = `
                    <h3 class="gym-name">${gym.name}</h3>
                    <div class="image">
                        <img src="${gym.image}" alt="${gym.name} Image">
                    </div>
                    <p><strong>Location:</strong> ${gym.location}</p>
                    <p><strong>Address:</strong> ${gym.address}</p>
                    <p><strong>Price:</strong> ${gym.price}</p>
                    <p><strong>Contact Number:</strong> ${gym.contact_number}</p>
                    <p>${gym.info}</p>
                `;
                gymsContainer.appendChild(gymCard);
            });
        })
        .catch(error => {
            console.error('Error fetching gyms:', error);
            alert('Error fetching gyms. Please try again.');
        });
}

function openFeedbackForm() {
    // Redirecting to the feedback form page
    window.location.href = "feedback.html";
}

// Adding event listener to the button
document.getElementById("openFeedbackFormButton").addEventListener("click", openFeedbackForm);






