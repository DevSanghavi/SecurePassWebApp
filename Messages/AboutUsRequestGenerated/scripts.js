document.getElementById('close-button').addEventListener('click', () => {
    const messageCard = document.getElementById('message-card');
    messageCard.style.display = 'none';
    // alert("Closing message card");
    window.location.href = 'example.html';
});

document.getElementById('ok-button').addEventListener('click', () => {
    alert("Acknowledged");
});