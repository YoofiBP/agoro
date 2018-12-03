function validation(){

//var allLetters = /^[a-zA-Z]+$/;
  var letter = /[a-zA-Z]/;
  var number = /[0-9]/;

var Email = document.getElementById("Email").value;
if (Email == "") {
  alert("Please enter your email");
  return false;
}

if (!/[@.]/.test(Email)) {
  alert("You don't listen!");
  return false;
}

var password =document.getElementById("password").value;
if (password == "") {
  alert("Please enter password");
  return false;
}
if (!allLetters.test(password)) {
  alert("Please do the right thing");
  return false;
}
if (!letter.test(password)) {
  alert("Please input both capital and small letters ");
  return false;
}
if (!number.test(password)) {
  alert("Please your password should be greater than 9 inputs");
  return false;
}
}
