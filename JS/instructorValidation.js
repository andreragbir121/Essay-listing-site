function validate(){

	clearErrors();
	
	let valid = true;
	
	let instructorID_element = document.getElementById('instructorID');
	let instructorID_regex = /^\d+$/;

	if(!instructorID_regex.test(instructorID_element.value)){
		instructorID_element.style.backgroundColor = "#ff5555";

		var instructorIDErr = document.getElementById('instructorIDErr');
		instructorIDErr.innerHTML = "Please enter your instructor ID";		
		valid = false;
	}


    
	let instructorName_element = document.getElementById('instructorName');
	let instructorName_regex = /[a-zA-Z]+[ a-zA-Z]*/;

	if(!instructorName_regex.test(instructorName_element.value)){
		instructorName_element.style.backgroundColor = "#ff5555";

		var instructorNameErr = document.getElementById('instructorNameErr');
		instructorNameErr.innerHTML = "Please enter your full name";		
		valid = false;
	}

	
	// Essay Rating

	let essayRating_element = document.getElementById('essayRating');
	let essayRatingErr = document.getElementById('essayRatingErr');
	
	if (!essayRating_element.value) {
		essayRating_element.style.backgroundColor = "#ff5555";
		essayRatingErr.innerHTML = "Please select a valid rating for essay";
		valid = false;
	}


	let grade_element = document.getElementById('grade');
	let gradeErr = document.getElementById('gradeErr');
	
	if (!grade_element.value) {
		grade_element.style.backgroundColor = "#ff5555";
		gradeErr.innerHTML = "Please select a valid grade for essay";
		valid = false;
	}




	let comment_element = document.getElementById('comment');
	let comment_regex = /^.{5,}$/;

	if(!comment_regex.test(comment_element.value)){
		comment_element.style.backgroundColor = "#ff5555";

		var commentErr = document.getElementById('commentErr');
		commentErr.innerHTML = "Comment must be 5 characters or more";		
		valid = false;
	}




}
function clearErrors(){
	var errors = document.getElementsByClassName('error');
	for(var i = 0; i < errors.length; i++){
		errors[i].innerHTML = "";
	}	

}