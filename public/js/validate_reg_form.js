//validate email
const emailInput = document.getElementById("email");

emailInput.addEventListener('blur', function() {
    const pattern = /^[A-Za-z\d._+-]+@[A-za-z]+\.[A-Za-z]{2,}$/;

    //check if the email format is valid
    if(!pattern.test(emailInput.value)) {
        emailInput.focus();
        emailInput.setCustomValidity("Please enter a valid email address");
        emailInput.reportValidity(); //immediately display the custom message
    } else {
        emailInput.setCustomValidity("");
    }
});

//validate phone number



