const pinDisplay = document.querySelector('.pin-display');
let pin = '';

document.querySelectorAll('.pin-button').forEach(button => {
    button.addEventListener('click', () => {
        if (button.classList.contains('clear-button')) {
            pin = '';
            pinDisplay.textContent = 'Enter Your PIN';
        } else if (button.classList.contains('submit-button')) {
            alert(`PIN submitted: ${pin}`);
            pin = '';
            pinDisplay.textContent = 'Enter Your PIN';
        } else {
            pin += button.textContent;
            if (pin.length > 4) pin = pin.slice(0, 4);  // Limit to 4 digits
            pinDisplay.textContent = '*'.repeat(pin.length);
        }
    });
});

document.querySelector('.close-button').addEventListener('click', () => {
    // Close or hide the card
    alert("Closing PIN Entry");
});