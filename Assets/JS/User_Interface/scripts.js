function manageProfile() {
    // alert('Manage Profile clicked');
    window.location.href = "User_Profile_Page.php";
    // Add your manage profile logic here
}

function deleteAccount() {
    alert('Delete Account clicked');
    // Add your delete account logic here
}

function logOut() {
    alert('Log Out clicked');
    window.location.href = "index.php";
    // Add your log out logic here
}


// const overlay = document.getElementById('overlay');
// // Add this code to your existing scripts.js
// document.querySelector('.account-circle-icon').addEventListener('click', function(event) {
//     //event.preventDefault(); // Prevent the default form submission
//     document.getElementById('overlay').style.display = 'flex'; // Show the modal
//     document.body.classList.add('blur'); // Add blur effect to the background
//   });  
//   overlay.addEventListener('click', function(event) {
//       if (event.target === overlay) {
//           hideOverlay();
//       }
//   });
  

const showMenu = document.getElementById("account-circle");
const userMenu = document.getElementById("user-menu");

showMenu.addEventListener('click', showOverlay);

function showOverlay() {
    if (userMenu.style.display === 'block') {
        userMenu.style.display = 'none'; // Hide if already visible
    } else {
        userMenu.style.display = 'block'; // Show the menu
    }
}

// Hide the menu when clicking outside of it
document.addEventListener('click', function(event) {
    if (!showMenu.contains(event.target) && !userMenu.contains(event.target)) {
        userMenu.style.display = 'none'; // Hide the menu if clicked outside
    }
});