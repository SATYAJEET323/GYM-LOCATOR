document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault();
    const formData = new FormData(this);

    fetch('authenticate.php', {
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
        if (data === 'success') {
            alert('Login Successful');
            window.location.href = "select_gym.html"; // Redirect to main page
        } else {
            alert('Invalid email or password');
        }
    })
    .catch(error => {
        console.error('There was a problem with your fetch operation:', error);
    });
});
