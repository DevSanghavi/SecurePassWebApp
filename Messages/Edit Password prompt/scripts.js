document.getElementById("password-form").addEventListener("submit", function(event) {
    event.preventDefault();

    const websiteName = document.getElementById("website-name").value;
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // Handle the form submission, e.g., send the data to a server
    // Below code is for demonstration purposes
    alert(`Changes saved for ${websiteName} with username ${username}`);
});

document.querySelector('.back-button').addEventListener('click', function() {
    window.history.back();
});