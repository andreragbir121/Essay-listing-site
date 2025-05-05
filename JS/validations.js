function validate(){

	clearErrors();
	
	let valid = true;
		
	let fname_element = document.getElementById('fname');// retrieves the input object with ID fname.
	let fname_regex = /^[a-zA-Z'!-]{2,30}$/;//matches all letters, apostrophes, exclamation, and hyphen characters

	if (!fname_regex.test(fname_element.value)){
		fname_element.value = "";
		fname_element.focus();
		fname_element.style.backgroundColor = "#ff5555";
		valid = false;
	}

	//code to validate the last name
	let lname_element = document.getElementById('lname');
	let lname_regex = /^[a-zA-Z'!-]{2,30}$/;

	if (!lname_regex.test(lname_element.value)){
		lname_element.value = "";
		lname_element.focus();
		lname_element.style.backgroundColor = "#ff5555";
		valid = false;
}

	//code to validate the email
	let email_element = document.getElementById('email');
	let email_regex = /^[a-zA-Z0-9]{3,24}@[ a-zA-Z0-9]{2,40}.[a-zA-Z]{2,4}$/;
	if(!email_regex.test(email_element.value)){
		email_element.style.backgroundColor = "#ff5555";

		var email_err = document.getElementById('email');
		email_err.innerHTML = "Please write an email format";		
		valid = false;
	}
	

	//code to validate birth year
	let birth_yr_element = document.getElementById('birth_yr');
	let birth_yr_regex = /^\d{4}$/;
	

	if(!birth_yr_regex.test(birth_yr_element.value)){
		birth_yr_element.style.backgroundColor = "#ff5555";

		var birth_yr_err = document.getElementById('birth_yr');
		birth_yr_err.innerHTML = "Only numbers, !,' and - allowed.";		
		valid = false;
	}





	// // An alternative approach is:
	// if(!fname_regex.test(fname_element.value)){
	// 	// write a message directly onto the web page using the innerHTML property
	// 	var fn_err = document.getElementById('fname_err');
	// 	fn_err.innerHTML = "Only letters, !,' and - allowed.";		
	// 	valid = false;
	// }
	
	return valid;
	
}

// This function is used to remove the error messages from the page when the user resubmits the form... e.g. if a user makes an error with fname and lname and tries to correct them both, however the system finds that there is still an error with the last name, it is important that they send the user only the error message for the last name on the second try.  To accomplish this we simply clear all the errors each time the user attempts to submit the form and the validation code will reinsert any errors which were made on the subsequent submission.
function clearErrors(){
	var errors = document.getElementsByClassName('error');
	for(var i = 0; i < errors.length; i++){
		errors[i].innerHTML = "";
	}	


}