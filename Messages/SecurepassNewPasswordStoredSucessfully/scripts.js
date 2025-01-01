document.getElementById('close-button').addEventListener('click', () => {
    const messageCard = document.getElementById('message-card');
    messageCard.style.display = 'none';
    alert("Closing message card");
});

document.getElementById('ok-button').addEventListener('click', () => {
    alert("Acknowledged");
});