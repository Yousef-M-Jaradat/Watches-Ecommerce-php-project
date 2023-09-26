

document
  .querySelector('input[name="email"]')
  .addEventListener("keyup", function () {
    validateEmail(this.value);
  });

document
  .querySelector('input[name="confirmEmail"]')
  .addEventListener("keyup", function () {
    validateConfirmEmail(this.value);
  });
document
  .querySelector('input[name="confirmPassword"]')
  .addEventListener("keyup", function () {
    validateConfirmPassword(this.value);
  });

document
  .querySelector('input[name="password"]')
  .addEventListener("keyup", function () {
    validatePassword(this.value);
  });
document
  .querySelector('input[name="firstname"]')
  .addEventListener("keyup", function () {
    validateFirstName(this.value);
  });

// Add event listener to last name input
document
  .querySelector('input[name="lastname"]')
  .addEventListener("keyup", function () {
    validateLastName(this.value);
  });

document
  .querySelector('input[name="Username"]')
  .addEventListener("keyup", function () {
    validateLUsername(this.value);
  });

// Regular expression for email
function validateEmail(email) {
  const emailInput = document.querySelector('input[name="email"]');
  const emailPattern =
    /^[a-zA-Z0-9._-]{4,}@(gmail.com|yahoo.com|outlook.com)$/i; // added
    const errorMessage = emailInput.parentNode.querySelector('.error-message');

  if (emailPattern.test(email)) {
    emailInput.classList.remove("is-invalid");
    emailInput.classList.add("is-valid");
    errorMessage.style.display = "none";
    errorMessage.textContent = "";
  } else {
    emailInput.classList.remove("is-valid");
    emailInput.classList.add("is-invalid");
    errorMessage.style.display = "block";
  }
}

// Regular expression for password validation (at least 8 characters, including a number and a special character)
function validatePassword(password) {
  const passwordInput = document.querySelector('input[name="password"]');
  const passwordPattern =
    /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z0-9\d@$!%*#?&]{8,}$/;
    const errorMessage = passwordInput.parentNode.querySelector('.error-message');

  if (passwordPattern.test(password)) {
    passwordInput.classList.remove("is-invalid");
    passwordInput.classList.add("is-valid");
    errorMessage.style.display = "none";
    errorMessage.textContent = "";
  } else {
    passwordInput.classList.remove("is-valid");
    passwordInput.classList.add("is-invalid");
    errorMessage.style.display = "block";
  }
}

function validateFirstName(firstname) {
  const firstnameInput = document.querySelector('input[name="firstname"]');
  const firstnamePattern = /^[A-Za-z]{4,30}$/;
  const errorMessage = firstnameInput.parentNode.querySelector('.error-message');

  if (firstnamePattern.test(firstname)) {
    firstnameInput.classList.remove("is-invalid");
    firstnameInput.classList.add("is-valid");
    errorMessage.style.display = "none";
    errorMessage.textContent = "";
  } else {
    firstnameInput.classList.remove("is-valid");
    firstnameInput.classList.add("is-invalid");
    errorMessage.style.display = "block";
  }
}


function validateLastName(lastname) {
  const lastnameInput = document.querySelector('input[name="lastname"]');
  const lastnamePattern = /^[A-Za-z]{4,30}$/;
  const errorMessage = lastnameInput.parentNode.querySelector('.error-message');

  

  if (lastnamePattern.test(lastname)) {
    lastnameInput.classList.remove("is-invalid");
    lastnameInput.classList.add("is-valid");
    errorMessage.style.display = "none";
    errorMessage.textContent = "";
  } else {
    lastnameInput.classList.remove("is-valid");
    lastnameInput.classList.add("is-invalid");
    errorMessage.style.display = "block";
  }
}
function validateLUsername(Username) {
  const UsernameInput = document.querySelector('input[name="Username"]');
  const UsernamePattern = /^[A-Za-z0-9\d@$!%*#?&]{5,}$/;
  const errorMessage = UsernameInput.parentNode.querySelector('.error-message');

  if (UsernamePattern.test(Username)) {
    UsernameInput.classList.remove("is-invalid");
    UsernameInput.classList.add("is-valid");
    errorMessage.style.display = "none";
    errorMessage.textContent = "";
  } else {
    UsernameInput.classList.remove("is-valid");
    UsernameInput.classList.add("is-invalid");
    errorMessage.style.display = "block";
  }
}

function validateConfirmEmail(confirmEmail) {
  const emailInput = document.querySelector('input[name="email"]');
  const confirmEmailInput = document.querySelector('input[name="confirmEmail"]');
  
   
  const errorMessage = confirmEmailInput.parentNode.querySelector('.error-message');



  if (confirmEmailInput.value === emailInput.value) {
    confirmEmailInput.classList.remove("is-invalid");
    confirmEmailInput.classList.add("is-valid");
    errorMessage.style.display = "none";
    errorMessage.textContent = "";
  } else {
    confirmEmailInput.classList.remove("is-valid");
    confirmEmailInput.classList.add("is-invalid");
    errorMessage.style.display = "block";
  }
}

// Validate confirm password
function validateConfirmPassword(confirmPassword) {
  const passwordInput = document.querySelector('input[name="password"]');
  const confirmPasswordInput = document.querySelector(
    'input[name="confirmPassword"]'
  );

  if (confirmPasswordInput.value === passwordInput.value) {
    confirmPasswordInput.classList.remove("is-invalid");
    confirmPasswordInput.classList.add("is-valid");
    errorMessage.style.display = "none";
    errorMessage.textContent = "";
  } else {
    confirmPasswordInput.classList.remove("is-valid");
    confirmPasswordInput.classList.add("is-invalid");
    errorMessage.style.display = "block";
  }
}
