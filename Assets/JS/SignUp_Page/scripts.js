var elements = document.querySelectorAll(".show-password");

elements.forEach(function(el) {
  el.addEventListener("click", toggle);
});


function toggle(e) {
  var el = this.previousElementSibling; 
  var isHidden = (el.type === "password");
  if(isHidden) {
    el.type = "text";
    this.innerHTML = "hide";
  } else {
    el.type = "password";
    this.innerHTML = "show";
  }
}


// Add this code to your existing scripts.js
document.getElementById('username-input').addEventListener('input', function() {
  const username = this.value;

  // Clear the message if the input is empty
  if (username.length === 0) {
      document.getElementById('username-message').innerText = '';
      return;
  }
});