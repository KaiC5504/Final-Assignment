//inputs and error nodes
const usernameInput = document.querySelector("#username");
const emailInput = document.querySelector("#email");
const passwordInput = document.querySelector("#password");
const dobInput = document.querySelector("#dob");
const signup = document.querySelector("#signup");
const errorNodes = document.querySelectorAll(".error");

//Validation
function validateForm() {

  clearMessages();
  let errorFlag = false;

  //Username validation
  if(usernameInput.value.length < 1) { 
    errorNodes[0].innerText = "Username cannot be empty";
    // usernameInput.classList.add("error-border");
    errorFlag = true;
  }

  //Email validation
  if (!emailIsValid(email.value)) { 
    errorNodes[1].innerText = "Email is not valid";
    // emailInput.classList.add("error-border"); 
    errorFlag = true;
  }

  //Password validation
  if(passwordInput.value.length < 8) { 
    errorNodes[2].innerText = "Password must be at least 8 characters";
    // passwordInput.classList.add("error-border");
    errorFlag = true;
  }

  //Date of birth validation
  if(dobInput.value.length < 1) { 
    errorNodes[3].innerText = "Date of birth cannot be empty";
    // dobInput.classList.add("error-border");
    errorFlag = true;
  }

  if (!errorFlag) {
    signup.innerText = "You have successfully signed up!";
  }
}


//Clear messages
function clearMessages() {
  for (let i = 0; i < errorNodes.length; i++) {
    errorNodes[i].innerText = "";
  }
  // usernameInput.classList.remove("error-border");
}

//Email validation
function emailIsValid(email) {
  let pattern = /\S+@\S+\.\S+/;
  return pattern.test(email);
}