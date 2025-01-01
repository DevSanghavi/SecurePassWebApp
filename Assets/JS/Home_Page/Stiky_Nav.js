// Select the navbar element
const nav = document.querySelector(".depth-2-frame-0");

// Function to handle the sticky navbar behavior
const fixNav = () => {
    // Check if the user has scrolled past the navbar's height
    if (window.scrollY > nav.offsetHeight) {
        // Add the sticky class to the navbar
        nav.classList.add("sticky");
    } else {
        // Remove the sticky class when not scrolled past
        nav.classList.remove("sticky");
    }
};

// Add an event listener for the scroll event
window.addEventListener("scroll", fixNav);