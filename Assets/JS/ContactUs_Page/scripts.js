const showMessageBtn = document.getElementById('showMessageBtn');
const overlay = document.getElementById('overlay');
const closeBtn = document.getElementById('closeBtn');
const submitBtn = document.getElementById('submitBtn');
const messagebox = document.getElementById('messagebox');
const body = document.body;

// Function to show the overlay and blur the background
function showOverlay() {
    overlay.style.display = 'flex';
    //body.style.filter = 'blur(1px)'; // Apply blur effect to the body
}

// Function to hide the overlay and remove blur
function hideOverlay() {
    overlay.style.display = 'none';
    body.style.filter = 'none'; // Remove blur effect from the body
}

// Show overlay when button is clicked
showMessageBtn.addEventListener('click', showOverlay);

// Hide overlay when close button is clicked
closeBtn.addEventListener('click', hideOverlay);

// Hide overlay when submit button is clicked
submitBtn.addEventListener('click', hideOverlay);

// Hide overlay when clicking outside the message box
overlay.addEventListener('click', function(event) {
    if (event.target === overlay) {
        hideOverlay();
    }
});

// const overlay = document.getElementById('overlay');
// const closeBtn = document.getElementById('closeBtn');
// const submitBtn = document.getElementById('submitBtn');

// // Function to hide the overlay
// function hideOverlay() {
//     overlay.style.display = 'none';
// }

// // Hide overlay when close button is clicked
// closeBtn.addEventListener('click', hideOverlay);

// // Hide overlay when OK button is clicked
// submitBtn.addEventListener('click', hideOverlay);

// // Show overlay if it is present in the HTML
// if (overlay) {
//     overlay.style.display = 'flex';
// }