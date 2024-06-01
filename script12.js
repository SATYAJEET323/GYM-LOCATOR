document.getElementById("registrationForm").addEventListener("submit", function(event) {
  event.preventDefault();
  const formData = new FormData(this);
  
  // Validating name
  const name = formData.get('name');
  if (name.trim() === '') {
    alert('Please enter your name');
    return;
  }

  // Validating email
  const email = formData.get('email');
  if (!isValidEmail(email)) {
    alert('Please enter a valid email address');
    return;
  }

  // Validating phone number
  const phone = formData.get('phone');
  if (!isValidPhone(phone)) {
    alert('Please enter a valid phone number');
    return;
  }

  // Validating password (minimum length of 6 characters)
  const password = formData.get('password');
  if (password.length < 6) {
    alert('Password must be at least 6 characters long');
    return;
  }

  // Function to validate email format
  function isValidEmail(email) {
      const re = /\S+@\S+\.\S+/;
      return re.test(email);
  }
    
  // Function to validate phone number format
  function isValidPhone(phone) {
      const re = /^\d{10}$/;
      return re.test(phone);
  }

  fetch('write.php', {
      method: 'POST',
      body: formData
  })
  .then(response => {
      if (!response.ok) {
          throw new Error('Network response was not ok');
      }
      return response.text();
  })
  .then(data => {
      alert('Registration Successful');
      window.location.href = "login.html"; // Redirect to login page after successful registration
  })
  .catch(error => {
      console.error('There was a problem with your fetch operation:', error);
  });
});

    