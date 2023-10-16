/* Lab 5 JavaScript File 
   Place variables and functions in this file */

window.onload = () => {
  document.getElementById("firstName").focus();
};

function validate(formObj) {
  // put your validation code here
  // it will be a series of if statements

  if (formObj.lastName.value == "") {
    alert("You must enter a last name");
    formObj.lastName.focus();
    return false;
  }
  if (formObj.title.value == "") {
    alert("You must enter a title");
    formObj.title.focus();
    return false;
  }
  if (formObj.org.value == "") {
    alert("You must enter an organization");
    formObj.org.focus();
    return false;
  }
  if (formObj.pseudonym.value == "") {
    alert("You must enter an nickname");
    formObj.pseudonym.focus();
    return false;
  }
  if (formObj.comments.value == "") {
    alert("You must enter a comment");
    formObj.comments.focus();
    return false;
  }
  if (formObj.firstName.value == "") {
    alert("You must enter a first name");
    formObj.firstName.focus();
    return false;
  }
  alert("Form Successfully Submitted");
  return true;
}

const clearTextArea = (id) => {
  field = document.getElementById(id);
  if (field.value === "Please enter your comments") field.value = "";
};

const displayNameValues = () => {
  firstName = document.getElementById("firstName").value;
  lastName = document.getElementById("lastName").value;
  nickname = document.getElementById("pseudonym").value;
  alert(` ${firstName} ${lastName} is ${nickname}`);
};
