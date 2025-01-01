document.getElementById('close-button').addEventListener('click', () => {
    const successCard = document.getElementById('success-card');
    successCard.style.display = 'none';
    alert("Closing success card");
});

document.getElementById('dashboard-button').addEventListener('click', () => {
    // Navigate to the dashboard or perform some action
    alert("Navigating to Dashboard");
});