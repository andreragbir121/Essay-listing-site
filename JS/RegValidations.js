function validate(){

	clearErrors();
	
	let valid = true;
		
	// full name validation - supposed to be for both registration and contact form:
	let fullName_element = document.getElementById('fullName');
	let fullName_regex = /[a-zA-Z]+[ a-zA-Z]*/;

	if(!fullName_regex.test(fullName_element.value)){
		fullName_element.style.backgroundColor = "#ff5555";

		var fullNameErr = document.getElementById('fullNameErr');
		fullNameErr.innerHTML = "Please enter your full name";		
		valid = false;
	}
	


	//code to validate the username
let username_element = document.getElementById('username');
let username_regex = /^[a-zA-Z0-9_\-!@#$%^&*()+=.,;:]+$/;

if(!username_regex.test(username_element.value)){
	username_element.style.backgroundColor = "#ff5555";

	var usernameErr = document.getElementById('usernameErr');
	usernameErr.innerHTML = "Please enter a valid username (No spaces allowed)";		
	valid = false;
}





// 	//code to validate the username
// 	let birthDate_element = document.getElementById('birthDate');
// 	let birthDate_regex = [a-zA-Z]+[ a-zA-Z]*;

// 	if (!birthDate_regex.test(birthDate_element.value)){
// 		birthDate_element.value = "";
// 		birthDate_element.focus();
// 		birthDate_element.style.backgroundColor = "#ff5555";
// 		valid = false;
// }


	//code to validate the Parent Name
	let parentName_element = document.getElementById('parentName');
	let parentName_regex =/[a-zA-Z]+[ a-zA-Z]*/;
	
	if(!parentName_regex.test(username_element.value)){
		parentName_element.style.backgroundColor = "#ff5555";
	
		var parentNameErr = document.getElementById('parentNameErr');
		parentNameErr.innerHTML = "Please enter a valid parent name (No spaces allowed)";		
		valid = false;
	}


	
	//code to validate the Parent Email
	let parentEmail_element = document.getElementById('parentEmail');
	let parentEmail_regex = /^[a-zA-Z0-9]{3,24}@[ a-zA-Z0-9]{2,40}.[a-zA-Z]{2,4}$/;
	if(!parentEmail_regex.test(parentEmail_element.value)){
		parentEmail_element.style.backgroundColor = "#ff5555";

		var parentEmailErr = document.getElementById('parentEmailErr');
		parentEmailErr.innerHTML = "Please write an email format";		
		valid = false;
	}
	

	let school_element = document.getElementById('schoolName');
	let schoolErr = document.getElementById('schoolErr');
	
	if (!school_element.value) {
		school_element.style.backgroundColor = "#ff5555";
		schoolErr.innerHTML = "Please select a school";
		valid = false;
	}

	let classLevel_element = document.getElementById('classLevel');
	let classLevelErr = document.getElementById('classLevel');
	
	if (!school_element.value) {
		school_element.style.backgroundColor = "#ff5555";
		schoolErr.innerHTML = "Please select a Class level";
		valid = false;
	}
	
	let password_element = document.getElementById('password');
	let password_regex = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
	
	if(!password_regex.test(password_element.value)){
		password_element.style.backgroundColor = "#ff5555";
	
		var passwordErr = document.getElementById('passwordErr');
		passwordErr.innerHTML = "Please enter a valid password";		
		valid = false;
	}
	
	// password confirm code found on stackoverflow: https://stackoverflow.com/questions/12090077/javascript-regular-expression-password-validation-having-special-characters
	let passwordConfirm_element = document.getElementById('passwordConfirm');
	let passwordConfirm_regex = new RegExp(password_element.value);
	
	if(!passwordConfirm_regex.test(passwordConfirm_element.value)){
		passwordConfirm_element.style.backgroundColor = "#ff5555";

		var passwordConfirmErr = document.getElementById('passwordConfirmErr');
		passwordConfirmErr.innerHTML = "Passwords do not match";        
		valid = false;
	}
	return valid;
}

// This function is used to remove the error messages from the page when the user resubmits the form... e.g. if a user makes an error with fname and lname and tries to correct them both, however the system finds that there is still an error with the last name, it is important that they send the user only the error message for the last name on the second try.  To accomplish this we simply clear all the errors each time the user attempts to submit the form and the validation code will reinsert any errors which were made on the subsequent submission.
function clearErrors(){
	var errors = document.getElementsByClassName('error');
	for(var i = 0; i < errors.length; i++){
		errors[i].innerHTML = "";
	}	


}