// Wait until the DOM is ready
document.addEventListener("DOMContentLoaded", function () {
  // Get the login form element
  var form = document.getElementById("loginForm");

  // When the form is submitted, check the validity of the form
  form.addEventListener(
    "submit",
    function (event) {
      // Prevent form submission if the form is invalid
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }

      // Add the 'was-validated' class to the form to show the feedback
      form.classList.add("was-validated");
    },
    false
  );
});

document.addEventListener("DOMContentLoaded", function () {
  let alert = document.getElementById("errorAlert");
  if (alert) {
    setTimeout(function () {
      alert.classList.remove("show"); // Bootstrap removes the "show" class
      alert.classList.add("fade"); // Ensure fade effect
      setTimeout(() => alert.remove(), 250); // Remove from DOM after fading out
    }, 5000); // Adjust time in milliseconds (5000ms = 5 seconds)
  }
});
