function validateAll(form) {
//validation user name entered
var title = document.forms['register']['username'].value;
if (title == "") {
  var response = "Please enter your name";
  alert(response);
  return false;
}

//validating email enetered
var email = document.forms['register']['email'].value;

if (email == ""){
  alert("Enter an email");
  return false;
}

//Regular expression used for validation
var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
if (re.test(email)==false){
  alert("Invalid email address entered");
return false;
}
if(form.password.value != "" && form.password.value == form.confirm_password.value) {
  //validatng to ensure a password contains at least 6 characters
if(form.password.value.length < 6) {
   alert("Error: Password must contain at least six characters!");
   form.password.focus();
   return false;
 }

//validating to ensure the password is not the same as the user name
 if(form.password.value == title) {
   alert("Error: Password must be different from Username!");
   form.password.focus()
   return false;
 }

//validating to ensure that the password contains a number from 0-9
 re = /[0-9]/;
 if(!re.test(form.password.value)) {
   alert("Error: password must contain at least one number (0-9)!");
   form.password.focus
   return false;
 }

//validating to enesure that the password contains a lowercase letter from a-z
 re = /[a-z]/;
 if(!re.test(form.password.value)) {
   alert("Error: password must contain at least one lowercase letter (a-z)!");
   form.password.focus();
   return false;
 }

//validating to enesure that the password contains an uppercase letter from a-z
 re = /[A-Z]/;
  if(!re.test(form.password.value)) {
    alert("Error: password must contain at least one uppercase letter (A-Z)!");
    form.password.focus();
    return false;
  }
}
else {
  //validation to match confirmed passwor with entered password
alert("Error: Please check that you've entered and confirmed your password!");
 form.password.focus();
 return false;
}

//validation to ensure a country is picked
if(form.country.value==""){
alert("Please pick a country");
return false;
}

//validation to ensure that a city is entered
if(form.city.value==""){
alert('Enter a city');
return false;
}

//validation to ensure a phone number is entered and number is 10-digits
if (form.number.value != ""){
if(form.number.value.length != 10){
alert("Enter a 10-digit phone number");
return false;
}
}
else{
alert("Enter a phone number");
return false;
}

//validation to ensure an image is uploaded
if (form.image.value ==""){
alert("Please upload image");
return false;
}

//validation to ensure that an address is entered
if(form.address.value == ""){
alert("Please enter an address");
return false;
}
return true;
}
