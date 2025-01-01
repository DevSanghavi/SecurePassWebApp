document.querySelector('.close-button').addEventListener('click', () => {
    // Clear the input field
    document.getElementById('password-field').value = '';
    // Close or hide the card
    alert("Closing input card");
});

document.querySelector('.cancel-button').addEventListener('click', () => {
    // Clear the input field
    document.getElementById('password-field').value = '';
    // Action for the Cancel button
    alert("Action canceled");
});

document.querySelector('.delete-button').addEventListener('click', () => {
    const password = document.getElementById('password-field').value;
    // Validate and action for the Delete button
    alert(`Password entered: ${password}`);
    // Clear the input field
    document.getElementById('password-field').value = '';
});