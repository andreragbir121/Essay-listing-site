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
	

	let Email_element = document.getElementById('Email');
	let Email_regex = /^[a-zA-Z0-9]{3,24}@[ a-zA-Z0-9]{2,40}.[a-zA-Z]{2,4}$/;
	if(!Email_regex.test(Email_element.value)){
		Email_element.style.backgroundColor = "#ff5555";

		var EmailErr = document.getElementById('EmailErr');
		EmailErr.innerHTML = "Please write an email format";		
		valid = false;
	}


	let phNumber_element = document.getElementById('phNumber');
	let phNumber_regex = /^[0-9]{10,15}$/;
	if(!phNumber_regex.test(Email_element.value)){
		phNumber_element.style.backgroundColor = "#ff5555";

		var phNumberErr = document.getElementById('phNumberErr');
		phNumberErr.innerHTML = "Please a valid phone number";		
		valid = false;
	}



	let comment_element = document.getElementById('comment');
	let comment_regex = /^.{10,}$/;
	if(!comment_regex.test(comment_element.value)){
		comment_element.style.backgroundColor = "#ff5555";

		var commentErr = document.getElementById('commentErr');
		commentErr.innerHTML = "Feedback must be at least 10 characters long";		
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