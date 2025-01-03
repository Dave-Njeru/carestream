document.querySelector("form").addEventListener("submit", function (event) {
  let is_form_submitable = true;

  //validate email
  const email_input = document.getElementById("email");
  const email_pattern = /^[A-Za-z\d._+-]+@[A-Za-z]+\.[A-Za-z]{2,}$/;

  if (!email_pattern.test(email_input.value)) {
    is_form_submitable = false;
    alert("Please enter a valid email address");
    email_input.focus();
  } else {
    is_form_submitable = true;
  }

  //validate phone number
  const phone_input = document.getElementById("contact");
  const phone_pattern = /^(?:254)[71]\d{8}$/;

  if (!phone_pattern.test(phone_input.value)) {
    is_form_submitable = false;
    alert("Please enter a valid phone number");
    phone_input.focus();
  } else {
    is_form_submitable = true;
  }

  //validate password
  const password_input = document.getElementById("password");
  const password_pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  if (!password_pattern.test(password_input.value)) {
    is_form_submitable = false;
    alert("Password should contain uppercase, lowercase, digit, special character, and minimum of 8 characters");
    password_input.focus();
  } else {
    is_form_submitable = true;
  }

  //check if form is submittable
  if (!is_form_submitable) {
    event.preventDefault();
  }
});
