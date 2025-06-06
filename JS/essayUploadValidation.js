function validate(){

	clearErrors();
	
	let valid = true;
	// essayID
	let essayID_element = document.getElementById('essayID');
	let essayID_regex = /^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/;		//regex retrieved from stackoverflow https://stackoverflow.com/questions/7684815/regex-pattern-to-match-at-least-1-number-and-1-character-in-a-string

if(!essayID_regex.test(essayID_element.value)){
	essayID_element.style.backgroundColor = "#ff5555";

	var essayIDErr = document.getElementById('essayIDErr');
	essayIDErr.innerHTML = "Please enter a 3 digit unique value for your essay ID";		
	valid = false;
}




	// username
let username_element = document.getElementById('username');
let username_regex = /^[a-zA-Z0-9_\-!@#$%^&*()+=.,;:]+$/;

if(!username_regex.test(username_element.value)){
	username_element.style.backgroundColor = "#ff5555";

	var usernameErr = document.getElementById('usernameErr');
	usernameErr.innerHTML = "Please enter a valid username (No spaces allowed)";		
	valid = false;
}


	// Student Full Name
	let studentName_element = document.getElementById('studentName');
	let studentName_regex = /[a-zA-Z]+[ a-zA-Z]*/;

	if(!studentName_regex.test(studentName_element.value)){
		studentName_element.style.backgroundColor = "#ff5555";

		var studentNameErr = document.getElementById('studentNameErr');
		studentNameErr.innerHTML = "Please enter student full name";		
		valid = false;
	}
	


	// Essay Title
let essayTitle_element = document.getElementById('essayTitle');
let essayTitle_regex = /^[a-zA-Z0-9\W]{3,}$/;

if(!essayTitle_regex.test(essayTitle_element.value)){
	essayTitle_element.style.backgroundColor = "#ff5555";

	var essayTitleErr = document.getElementById('essayTitleErr');
	essayTitleErr.innerHTML = "Please enter a valid Essay Title";		
	valid = false;
}




	// Essay First Paragraph
let essayFirstParagraph_element = document.getElementById('essayFirstParagraph');
let essayFirstParagraph_regex = /^[a-zA-Z0-9\W]{50,}$/;

if(!essayFirstParagraph_regex.test(essayFirstParagraph_element.value)){
	essayFirstParagraph_element.style.backgroundColor = "#ff5555";

	var essayFirstParagraphErr = document.getElementById('essayFirstParagraphErr');
	essayFirstParagraphErr.innerHTML = "Essay first paragraph must be at least a minimum of 50 characters";		
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
	
	if (!classLevel_element.value) {
		classLevel_element.style.backgroundColor = "#ff5555";
		classLevelErr.innerHTML = "Please select a Class level";
		valid = false;
	}


	
	//essay date
	let essayDate_element = document.getElementById('essayDate');
	let essayDate_regex = /^\d{4}-\d{2}-\d{2}$/;

	if (!essayDate_regex.test(essayDate_element.value)){
		essayDate_element.value = "";
		essayDate_element.focus();
		essayDate_element.style.backgroundColor = "#ff5555";
		valid = false;
}




	// Essay Grade
let essayGrade_element = document.getElementById('essayGrade');
let essayGrade_regex = /^[a-zA-Z]$/;

if(!essayGrade_regex.test(essayGrade_element.value)){
	essayGrade_element.style.backgroundColor = "#ff5555";

	var essayGradeErr = document.getElementById('essayGradeErr');
	essayGradeErr.innerHTML = "Please enter a valid grade";		
	valid = false;
}



	// Full Essay
let fullEssay_element = document.getElementById('fullEssay');
let fullEssay_regex = /^[a-zA-Z0-9\W]{300,}$/;

if(!fullEssay_regex.test(fullEssay_element.value)){
	fullEssay_element.style.backgroundColor = "#ff5555";

	var fullEssayErr = document.getElementById('fullEssayErr');
	fullEssayErr.innerHTML = "Please enter the full essay here";		
	valid = false;
}

	return valid;
}

function clearErrors(){
	var errors = document.getElementsByClassName('error');
	for(var i = 0; i < errors.length; i++){
		errors[i].innerHTML = "";
	}	


}