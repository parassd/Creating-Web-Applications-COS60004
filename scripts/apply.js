// Use your own variable names and ids

"use strict";

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
} 

// Function to count to 120 seconds
var seconds = 0
setInterval(function () {
    seconds++;
    document.getElementById('comment').innerHTML = "Let's get started! Fill the form fast, you only have a minute!";
    if (seconds >30){
    	document.getElementById('comment').innerHTML = "Still filling it? Think of this as a typing test!";
    }
    if (seconds > 60){
    	document.getElementById('comment').innerHTML = "A super IT Consultant should type fast!";
    }
    if(seconds > 90){
		document.getElementById('comment').innerHTML = "Maybe you should try again, later!";
	}
	if(seconds >= 120){
		alert("Time's up! Try again later. You will be redirected back to the careers page.");
		setTimeout(function(){
			window.location.href = "jobs.php";
		},5);
	}
    var result = parseInt(seconds / 60) + ':' + seconds % 60; //formart seconds back into mm:ss 
    document.getElementById('timer').innerHTML = "Time taken so far: <br>"+result;
}, 1000) 



function getAgeInYears(){
	var age = -1;
	const YEAR_IN_MILLISECONDS = 365*24*60*60*1000;
	var current = new Date();
	var dobString = document.getElementById("dob").value.trim();
	var ddmmyy = dobString.split("/");
	var dob = new Date(ddmmyy[2],ddmmyy[1],ddmmyy[0],0,0,0,0);
	age=(current.valueOf()-dob.valueOf())/YEAR_IN_MILLISECONDS;
	return age;
}

function validatePostcode() {
    var err = "";
    var state = document.getElementById("state").value.trim();
	var postcode = document.getElementById("postcode").value.trim();

    function postcodeRegexMatch(n1, n2) {
        if (n2) {
            var argRegEx = new RegExp("^[" + n1 + "|" + n2 + "]\\d{3}");
            if (!postcode.match(argRegEx)) {
                err = err + "Your postcode is incorrect";
            }
        } else {
        	var argRegEx = new RegExp("^[" + n1 + "]\\d{3}");
            if (!postcode.match(argRegEx)) {
                err = err + "Your postcode is incorrect";
            }
        }
    }

    switch (state) {
        case "VIC":
            postcodeRegexMatch(3, 8);
            break;
        case "NSW":
            postcodeRegexMatch(1, 2);
            break;
        case "QLD":
            postcodeRegexMatch(4, 9);
            break;
        case "NT":
            postcodeRegexMatch(0);
            break;
        case "WA":
            postcodeRegexMatch(6);
            break;
        case "SA":
            postcodeRegexMatch(5);
            break;
        case  "TAS":
            postcodeRegexMatch(7);
            break;
        case  "ACT":
            postcodeRegexMatch(0);
            break;
        default:
            err+= "Your postcode is incorrect";
    }
    return err;
}

function saveJobReference(job_reference){
	if (typeof(Storage)!=="undefined"){
		localStorage.setItem("job_reference",job_reference)
	}
}

function loadJobReference(){
	if (typeof(Storage)!=="undefined"){
		if (localStorage.getItem("job_reference")!==null){
			var job_reference = document.getElementById("ref_id");
			job_reference.value = localStorage.getItem("job_reference");
			job_reference.readOnly = true;
		}
	}
}

function storeData(fname,lname,dob,street_address,suburb,postcode,email,phone,state,other_skills_text){
	if (typeof(Storage)!=="undefined"){
		sessionStorage.setItem("fname", fname);
		sessionStorage.setItem("lname", lname);
		sessionStorage.setItem("dob", dob);
		sessionStorage.setItem("street_address", street_address);
		sessionStorage.setItem("suburb", suburb);
		sessionStorage.setItem("postcode", postcode);
		sessionStorage.setItem("email", email);
		sessionStorage.setItem("phone", phone);
		sessionStorage.setItem("state", state);
		sessionStorage.setItem("other_skills_text", other_skills_text);
	}
}

function loadData(){
	 if (typeof(Storage)!=="undefined"){
	 	if (sessionStorage.getItem("fname") !== null){   
			document.getElementById("first_name").value = sessionStorage.getItem("fname");	
		}
		if (sessionStorage.getItem("lname") !== null){   
			document.getElementById("last_name").value = sessionStorage.getItem("lname");	
		}
		if (sessionStorage.getItem("dob") !== null){   
			document.getElementById("dob").value = sessionStorage.getItem("dob");	
		}
		if (sessionStorage.getItem("street_address") !== null){   
			document.getElementById("street_address").value = sessionStorage.getItem("street_address");	
		}
		if (sessionStorage.getItem("suburb") !== null){   
			document.getElementById("suburb").value = sessionStorage.getItem("suburb");	
		}
		if (sessionStorage.getItem("postcode") !== null){   
			document.getElementById("postcode").value = sessionStorage.getItem("postcode");	
		}
		if (sessionStorage.getItem("email") !== null){   
			document.getElementById("email").value = sessionStorage.getItem("email");	
		}
		if (sessionStorage.getItem("phone") !== null){   
			document.getElementById("phone").value = sessionStorage.getItem("phone");	
		}
		if (sessionStorage.getItem("state") !== null){   
			document.getElementById("state").value = sessionStorage.getItem("state");	
		}
		if (sessionStorage.getItem("other_skills_text") !== null){   
			document.getElementById("other_skill_text").value = sessionStorage.getItem("other_skills_text");	
		}
	 }
}

function validate(){
	var error_message = "";
	var result = true;

	// Get Values from Form
	var fname = document.getElementById("first_name").value.trim();
	var lname = document.getElementById("last_name").value.trim();
	var dob = document.getElementById("dob").value.trim();
	// set default value for gender
	document.getElementById("radio_button_1").checked = true;
	var street_address = document.getElementById("street_address").value.trim();
	var suburb = document.getElementById("suburb").value.trim();
	// get checkbox element and check for validation
	var postcode = document.getElementById("postcode").value.trim();
	var email = document.getElementById("email").value.trim();
	var phone = document.getElementById("phone").value.trim();
	var age = getAgeInYears();
	var state = document.getElementById("state").value.trim();
	// check for skills
	var other_skills = document.getElementById("other_skills").value.trim();
	var other_skills_text = document.getElementById("other_skill_text").value.trim();
	
	// location where error message is displayed
	var message = document.getElementById("message");
	

	// Name Validation
	if(fname == ""){
		error_message+= "First name is required<br/>";
	}else if (!fname.match(/^[a-zA-Z ]+$/)){
		error_message+= "Please enter a string for first name<br/>";
	}else if (fname.length>20){
		error_message+= "First name must be less than 20 characters<br/>";	
	}

	if (lname == ""){
		error_message+= "Last name is required <br/>";
	}else if (!lname.match(/^[a-zA-Z ]+$/)){
		error_message+= "Please enter a string for last name<br/>";
	}

	// dob validation
	if(dob == ""){
		error_message+= "Date of birth is required<br/>";
	}else if (!dob.match(/(((0|1)[0-9]|2[0-9]|3[0-1])\/(0[1-9]|1[0-2])\/((19|20)\d\d))$/)){
		error_message+= "Date of birth must be of the format DD/MM/YYYY<br/>";	
	}

	// age validation
	if (age<0){
		error_message+="Invalid age<br/>";
	}else if (age<15 || age>80){
		error_message+="Applicant must be between 15 and 80 years old at the time of filling this form.<br/>";
	}

	// address validation
	if (street_address == ""){
		error_message+= "Street address is required<br/>";
	}else if (!street_address.match(/^[0-9a-zA-Z ]+$/)){
		error_message+="Please enter a string for street address<br/>";
	}else if (street_address.length > 40){
		error_message+= "Street address limit is 40 characters<br/>";
	}

	if (suburb == ""){
		error_message+= "Suburb is required<br/>";
	}else if (!suburb.match(/^[a-zA-Z ]+$/)){
		error_message+="Please enter a string for suburb<br/>";
	}else if (suburb.length > 40){
		error_message+= "Suburb limit is 40 characters<br/>";
	}

	if (state == ""){
		error_message+="Please select a state<br/>";
	}

	if (postcode == ""){
		error_message+="Postcode is required<br/>";
	}else if (!postcode.match(/\d{4}/) || postcode.length!=4){
		error_message+= "Postcode must be exactly 4 digits<br/>";
	}else if (validatePostcode(state, postcode)!=""){
		error_message+=validatePostcode(state, postcode)+"<br/>";
	}

	if (email == ""){
		error_message+= "Email is required<br/>";
	}else if (!email.match(/^.+@.+\..{2,3}$/)){
		error_message+= "Please enter valid email<br/>";	
	}

	// phone number validation
	if (phone == ""){
		error_message+= "Phone number is required<br/>";
	}else if (phone.length<8 || phone.length>12){
		error_message+= "Please enter a phone number between 8 to 12 digits.<br/>";
	}

	if (this.other_skills.checked && other_skills_text == ""){
		error_message+= "Other skills are required<br/>";
	}

	// display error message
	if (error_message != ""){
		result = false;
		message.innerHTML = error_message;
		message.style.color = "red";
	}else{
		storeData(fname,lname,dob,street_address,suburb,postcode,email,phone,state,other_skills_text);
	}

	return result;
}


function init(){

	if (document.getElementById("apply_page")!=null){
		loadJobReference();
		loadData();
		// var application_form = document.getElementById("application_form");
		// application_form.onsubmit = validate;	
	}else if (document.getElementById("jobs_page")!=null){
		var apply_links = document.getElementsByClassName("apply_links");
		console.log(apply_links);
		for (var i = 0; i<apply_links.length; i++){
			apply_links[i].onclick = function(){
				saveJobReference(this.id);
			}
		}
	}
}

window.onload = init;
