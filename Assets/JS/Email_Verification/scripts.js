// Automatically move to the next input box and handle backspace
document.querySelectorAll('input').forEach((input, index, inputs) => {
    input.addEventListener('input', () => {
      if (input.value.length === input.maxLength && index < inputs.length - 1) {
        inputs[index + 1].focus();
      }
    });
  
    input.addEventListener('keydown', (e) => {
      if (e.key === 'Backspace' && index > 0) {
        if (input.value.length === 0) {
          inputs[index - 1].focus();
        } else {
          input.value = '';
        }
      }
    });
  });


// Add this code to your existing scripts.js
// document.querySelector('.depth-6-frame-17').addEventListener('click', function(event) {
//     event.preventDefault(); // Prevent the default form submission
//     document.getElementById('overlay').style.display = 'flex'; // Show the modal
//     document.body.classList.add('blur'); // Add blur effect to the background
//   });
  
  
//   document.getElementById('close-button').addEventListener('click', () => {
//     const messageCard = document.getElementById('message-card');
//     messageCard.style.display = 'none';
//     alert("Closing message card");
//   });
  
//   document.getElementById('ok-button').addEventListener('click', () => {
//     alert("Acknowledged");
//   });
  
//   overlay.addEventListener('click', function(event) {
//       if (event.target === overlay) {
//           hideOverlay();
//       }
//   });
  